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
use Illuminate\Support\Facades\Log;
class SpeakController extends Controller
{
    public function index(){
        return view('pages.admin.speak.topic.index');
    }

    public function ListTopic()
    {
        try {
            $data = Speak::orderBy('id', 'DESC')->paginate(10);
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
            $data = $query->where('id', $id)->with(['QuestitonSpeak' => function ($question) {
                $question->with('answers')->with('right_answers');
            }])->first();
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
            if ($request->has('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/speaking'), $file_name);
                Speak::create([
                    "name" => $request->name,
                    "description" => $request->description,
                    'audio_url' => $_SERVER['SERVER_NAME'] . '/upload/speaking/' . $file_name,
                    'path_url' => 'upload/speaking/' . $file_name,
                    "is_exam" => $request->isExam
                ]);
    
            }else {
                Speak::create([
                    "name" => $request->name,
                    "description" => $request->description,
                    "is_exam" => $request->isExam
                ]);
            }
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
    public function updateSpeak(Request $request, $id)
    {
        
        try {
            if ($request->has('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/speaking'), $file_name);
                Speak::whereId($id)->update([
                    "name" => $request->name,
                    "description" => $request->description,
                    'audio_url' => $_SERVER['SERVER_NAME'] . '/upload/speaking/' . $file_name,
                    'path_url' => 'upload/speaking/' . $file_name
                ]);
    
            }else {
                Speak::whereId($id)->update([
                    "name" => $request->name,
                    "description" => $request->description,
                    "is_exam" => $request->isExam
                ]);
            }
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
                    "name" => $request->name,
                    "description" => $request->description
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
            $speak = Speak::create([
                "name" => $data['name'],
                "description" => $data['description'] ?? '',
                "is_exam" => $data['isExam'],
            ]);
            $dataQuestions = $data['dataQuestion'];
            foreach ($dataQuestions as $key => $value) {
                $res = QuestionSpeak::create([
                    "id" => $value['id'],
                    "question" => $value['question'],
                    "level" => $value['level'],
                    "type" => $value['type']
                ]);
                $query = new Speak();
                $query->find($speak->id)->QuestitonSpeak()->attach(
                [
                    'question_speak_id' => $res->id
                ]);
                if ($res->type == 1) {
                    $res->right_answers()->create([
                        "answer_id" => $value["answer"]
                    ]);
                }

                foreach ($value['dataAns'] as $keyAds => $item) {
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
                "message" => "Create question successfully !"
            ];
        } catch (\Exception $e) {
            Log::error($e);
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
            $speak = Speak::whereId($request->id)->first();
            $speak->update([
                'name' => $request->name,
                'description' => $request->description,
                'is_exam' => $request->is_exam,
            ]);
            $dataQuestion = ($request->dataQuestion);
            $questionList = $speak->QuestitonSpeak()->get()->toArray();
            $toDelete = collect($questionList)->whereNotIn('id', collect($dataQuestion)->pluck('id'))->all();

            if (count($toDelete)) {
                foreach($toDelete as $item) {
                    QuestionSpeak::whereId($item['id'])->delete();
                }
            }
            foreach ($dataQuestion as $key => $value) {
                $check = QuestionSpeak::whereId($value['id'])->exists();
                if (!$check) {
                    $question = $speak->QuestitonSpeak()->create([
                        'question' => $value['question'],
                        'level' => $value['level'],
                        'type' => $value['type']
                    ]);
                    foreach ($value['dataAns'] as $keyAns => $valueAns) {
                        $question->answers()->create([
                            'id' => $valueAns['idAns'],
                            'question_id' => $question->id,
                            'text' => $valueAns['text'],
                            "answer_id" => $valueAns['idAns'],
                        ]);
                    }
                    if ($value['answer']) {
                        $question->right_answers()->create([
                            'answer_id' => $value['answer']
                        ]);
                    }
                } else {
                    QuestionSpeak::whereId($value['id'])->first()->update([
                        "question" => $value['question'],
                        "level" => $value['level'],
                        "type" => $value['type']
                    ]);
                    if ($value['answer']) {
                        QuestionSpeak::whereId($value['id'])->first()->right_answers()->update([
                            "answer_id" => $value["answer"]
                        ]);
                    }
                    QuestionSpeak::whereId($value['id'])->first()->answers()->delete();
                    foreach ($value['dataAns'] as $keyAds => $valueAns) {
                        QuestionSpeak::whereId($value['id'])->first()->answers()
                            ->create([
                                'id' => $valueAns['idAns'],
                                'question_id' => $value['id'],
                                'text' => $valueAns['text'],
                                "answer_id" => $valueAns['idAns'],
                            ]);
                    }
                }
            }
            
            DB::commit();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Update successfully"
            ];
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Update failed !"
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
            "is_exam" => $request->isExam
        ]);
        return [
            "status" => 200,
            "errorCode" => 0,
            "message" => "Thêm câu hỏi thành công !"
        ];
    }
    public function allQuestionLuyenAm(Request $request){
        if(isset($request->page)){
            $questions = QuestionLuyenAm::paginate(10);

        }else {
            $questions = QuestionLuyenAm::all();
        }
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
            "is_exam" => $request->isExam
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
            if(isset($request->level_id)){
                SaveResultExamSpeaking::create([
                    'level_id' => $request->level_id,
                    'user_id' => $request->user_id,
                    'test_id' => $request->test_id,
                    'url_audio' => $_SERVER['SERVER_NAME'] . ':8000/upload/audio-speaking/'.$request->email.'/' . $file_name,
                ]);
            }else {
                SaveResultExamSpeaking::create([
                    'exam_id' => $request->exam_id,
                    'user_id' => $request->user_id,
                    'test_id' => $request->test_id,
                    'url_audio' => $_SERVER['SERVER_NAME'] . ':8000/upload/audio-speaking/'.$request->email.'/' . $file_name,
                 ]);
            }
        }
        return [
            "status" => 200,
            "errorCode" => 0,
            "message" => "Save file ghi âm thành công !"
        ];

    }
    public function getAudioUser(Request $request){
        if(isset($request->exam_final_id)){
            $data = SaveResultExamSpeaking::where('exam_id',  $request->exam_final_id)->where('user_id', $request->user_id)->where('test_id', $request->exam_id)->first();
        }else {
            $data = SaveResultExamSpeaking::where('level_id',  $request->level_id)->where('user_id', $request->user_id)->where('test_id', $request->exam_id)->first();
        }
        return [
            "status" => 200,
            "errorCode" => 0,
            "data" => $data,
            "message" => "Lấy file ghi âm thành công !"
        ];
    }
}
