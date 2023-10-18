<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Vocabulary\AnswerVocabulary;
use App\models\Vocabulary\QuestionVocabulary;
use App\models\Vocabulary\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class VocabularyController extends Controller
{
    public function index()
    {
        return view('pages.admin.vocabulary.topic.index');
    }

    public function ListTopic()
    {
        try {
            $data = Vocabulary::all();
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
        return view('pages.admin.vocabulary.topic.detail', compact('id'));
    }

    public function detailTopicData(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $query = new Vocabulary();
            $data = $query->where('id', $id)->with('questitonVocabulary')->first();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $data,
                "message" => "Lấy chi tiết topic thành công !"
            ]);
        } catch (\Exception $e) {
             DB::rollBack();
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
            DB::beginTransaction();
            Vocabulary::create([
                "name" => $request->name,
                "description" => $request->description,
                "is_exam" => $request->isExam,
            ]);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm topic thành công !"
            ]);
        } catch (\Exception $e) {
             DB::rollBack();
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
            DB::beginTransaction();
            $query = new Vocabulary();
            $query->find($request->idTopic)->questitonVocabulary()->attach(
                [
                    'question_vocabulary_id' => $request->idQues
                ]

            );
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm câu hỏi vào topic thành công !"
            ]);
        } catch (\Exception $e) {
             DB::rollBack();
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
            DB::beginTransaction();
            $query = new Vocabulary();
            $query->find($request->idTopic)->questitonVocabulary()->detach(
                [
                    'question_vocabulary_id' => $request->idQues
                ]

            );
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa câu hỏi vào topic thành công !"
            ]);
        } catch (\Exception $e) {
             DB::rollBack();
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
            DB::beginTransaction();
            $vocabulary = Vocabulary::find($request->id);
            $vocabulary->questitonVocabulary()->detach();
            $vocabulary->delete();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa topic thành công !"
            ]);
        } catch (\Exception $e) {
             DB::rollBack();
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
            DB::beginTransaction();
            $vocabulary = Vocabulary::find($request->id);
            $vocabulary->update(
                [
                    "name" => $request->name,
                    "description" => $request->description
                ]
            );
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Sửa topic thành công !"
            ]);
        } catch (\Exception $e) {
             DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Sửa topic thất bại !"
            ]);
        }


    }

    public function questionlist()
    {
        return view('pages.admin.vocabulary.question.index');
    }

    public function getAllInfoQuestion(Request $request)
    {
        try {
            $query = new QuestionVocabulary();
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
        return view('pages.admin.vocabulary.question.create');
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $data = $request->all();
            foreach ($data as $key => $value) {
                $res = QuestionVocabulary::create([
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
                    QuestionVocabulary::find($value['id'])->answers()->create([
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
            $res = QuestionVocabulary::where('id', $request->id)->first();
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
            DB::beginTransaction();
            AnswerVocabulary::find($request->id)->delete();
            DB::commit();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa câu trả lời thành công !"
            ];
        } catch (Exception $e) {
            DB::rollBack();
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
            QuestionVocabulary::find($request->id)->delete();
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
}
