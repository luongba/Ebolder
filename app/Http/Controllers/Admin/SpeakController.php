<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Speak\AnswerSpeak;
use App\models\Speak\Speak;
use App\models\Speak\QuestionSpeak;
use App\models\Speak\QuestionLuyenAm;
use App\models\Speak\SaveResultExamSpeaking;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
class SpeakController extends Controller
{
    public function index(){
        return view('pages.admin.speak.topic.index');
    }

    public function ListTopic()
    {
        try {
            $data = Speak::all();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $data,
                "message" => "Lấy danh sách topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Lấy danh sách topic thất bại !"
            ]);
        }
    }

    public function detailTopic($id)
    {
        return view('pages.admin.speak.topic.detail', compact('id'));
    }

    public function detailTopicData(Request $request, $id)
    {
        try {
            $query = new Speak();
            $data = $query->where('id', $id)->with('QuestitonSpeak')->first();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $data,
                "message" => "Lấy chi tiết topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Lấy chi tiết topic thất bại !"
            ]);
        }

//        return view('pages.admin.vocabulary.topic.detail');
    }

    public function createTopic(Request $request)
    {
        try {
            Speak::create([
                "name" => $request->name,
                "description" => $request->description
            ]);
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm topic thất bại !"
            ]);
        }


    }

    public function addQuestionToTopic(Request $request)
    {
        try {
            $query = new Speak();
            $query->find($request->idTopic)->QuestitonSpeak()->attach(
                [
                    'question_speak_id' => $request->idQues
                ]

            );
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm câu hỏi vào topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm câu hỏi vào topic thất bại !"
            ]);
        }
    }
    public function removeQuestionFromTopic(Request $request)
    {
        try {
            $query = new Speak();
            $query->find($request->idTopic)->QuestitonSpeak()->detach(
                [
                    'question_speak_id' => $request->idQues
                ]

            );
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa câu hỏi vào topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa câu hỏi vào topic thất bại !"
            ]);
        }
    }

    public function deleteTopic(Request $request)
    {
        try {
            $speak = Speak::find($request->id);
            $speak->QuestitonSpeak()->detach();
            $speak->delete();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa topic thất bại !"
            ]);
        }


    }
    public function editTopic(Request $request)
    {
        try {
            $speak = Speak::find($request->id);
            $speak->update(
                [
                    "name" => $request->name
                ]
            );
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Sửa topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Sửa topic thất bại !"
            ]);
        }


    }

    public function questionlist()
    {
        return view('pages.admin.speak.question.index');
    }

    public function getAllInfoQuestion(Request $request)
    {
        try {
            $query = new QuestionSpeak();
            $dataAll = $query->with('answers')->with('right_answers')->get();
            $data = $query->with('answers')->with('right_answers')->take($request->take)->get();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => isset($request->take) ? $data : $dataAll,
                "count" => $dataAll->count()


            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => $e->getCode(),
                "errorCode" => $e->getCode(),
                "data" => null,
                "message" => $e->getMessage()
            ]);
        }

    }

    public function create()
    {
        return view('pages.admin.speak.question.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            foreach ($data as $key => $value) {
                $res = QuestionSpeak::create([
                    "id" => $value['id'],
                    "question" => $value['question'],
                    "level" => $value['level'],
                    "type" => $value['type']
                ]);
                if ($res->type == 1) {
                    $res->right_answers()->create([
                        "answer_id" => $value["answer"]
                    ]);
                }


                foreach ($data[$key]['dataAns'] as $keyAds => $item) {
                    QuestionSpeak::find($value['id'])->answers()->create([
                        "id" => $item['idAns'],
                        "text" => $item['text'],
                        "answer_id" => $item['idAns'],
                    ]);
                }
            }
            DB::commit();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm câu hỏi thành công !"
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm câu hỏi thất bại !"
            ];
        }


    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $res = QuestionSpeak::where('id', $request->id)->first();
            $res->update(
                [
                    "question" => $request->question,
                    "level" => $request->level,

                ]
            );
            if ($request->type == 1) {
                foreach ($request->dataAns as $keyAds => $item) {
                    $ans = $res->answers()->find($item['id']);
                    if (isset($ans)) {

                        $ans->update([
                            "text" => $item['text']
                        ]);
                    } else {
                        $res->answers()->create([
                            "id" => $item['id'],
                            "answer_id" => $item['id'],
                            "text" => $item['text']
                        ]);
                    }


                }
            } else {
                $res->answers()->delete();
                foreach ($request->dataAns as $keyAds => $item) {
                    $res->answers()->create([
                        "id" => $item['id'],
                        "answer_id" => $item['id'],
                        "text" => $item['text']
                    ]);


                }
            }
            if ($request->type == 1) {
                $res->right_answers()->find($request->right_answers["id"])->update([
                    "answer_id" => $request->right_answers["answer_id"]
                ]);
            }
            DB::commit();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Sửa câu hỏi thành công !"
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Sửa câu hỏi thất bại !"
            ];
        }


    }

    public function destroyAns(Request $request)
    {
        try {
            AnswerSpeak::find($request->id)->delete();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa câu trả lời thành công !"
            ];
        } catch (Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa câu trả lời thất bại !"
            ];
        }


    }

    public function destroyQues(Request $request)
    {
        try {
            QuestionSpeak::find($request->id)->delete();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa câu hỏi thành công !"
            ];
        } catch (Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa câu hỏi thất bại !"
            ];
        }


    }
    public function pageQuestionSpeak(){
        return view('pages.admin.speak.question.luyenam');
    }

    public function createQuestionLuyenAm(Request $request){
        QuestionLuyenAm::create([
            "name" =>  $request->name,
            "content" => $request->content,
        ]);
        return [
            "status" => 200,
            "errorCode" => 0,
            "message" => "Thêm câu hỏi thành công !"
        ];
    }
    public function allQuestionLuyenAm(Request $request){
        $questions = QuestionLuyenAm::paginate(10);
        return [
            "status" => 200,
            "errorCode" => 0,
            "data"=>  $questions,
            "message" => "Thêm câu hỏi thành công !"
        ];
    }
    public function updateQuestionLuyenAm(Request $request, $id){
        QuestionLuyenAm::find($id)->update([
            "name" =>  $request->name,
            "content" => $request->content,
        ]);
        return [
            "status" => 200,
            "errorCode" => 0,
            "message" => "Cập nhật câu hỏi thành công !"
        ];
    }
    public function deleteQuestionLuyenAm(Request $request, $id){
        QuestionLuyenAm::find($id)->delete();
        return [
            "status" => 200,
            "errorCode" => 0,
            "message" => "Cập nhật câu hỏi thành công !"
        ];
    }

    public function saveResultExam(Request $request){
        if ($request->has('file')) {
            $file = $request->file;
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/audio-speaking/'.$request->email), $file_name);
            SaveResultExamSpeaking::create([
                'level_id' => $request->level_id,
                'user_id' => $request->user_id,
                'test_id' => $request->test_id,
                'url_audio' => $_SERVER['SERVER_NAME'] . ':8000/upload/audio-speaking/'.$request->email.'/' . $file_name,
            ]);
        }
        return [
            "status" => 200,
            "errorCode" => 0,
            "message" => "Lưu file ghi âm thành công !"
        ];

    }
    public function getAudioUser(Request $request){
        $data = SaveResultExamSpeaking::where('level_id',  $request->level_id)->where('user_id', $request->user_id)->where('test_id', $request->exam_id)->first();
        return [
            "status" => 200,
            "errorCode" => 0,
            "data" => $data,
            "message" => "Lấy file ghi âm thành công !"
        ];
    }
}
