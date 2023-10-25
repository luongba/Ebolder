<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Grammar\AnswerGrammar;
use App\models\Grammar\Grammar;
use App\models\Grammar\LevelGrammar;
use App\models\Grammar\QuestionGrammar;
use App\models\Vocabulary\AnswerVocabulary;
use App\models\Vocabulary\QuestionVocabulary;
use App\models\Vocabulary\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class GrammarController extends Controller
{
    public function index()
    {
        return view('pages.admin.grammar.topic.index');
    }

    public function ListTopic(Request $request)
    {
        try {
            if ($request->is_exam) {
                $data = Grammar::where('is_exam', 1)->orderBy('id', 'DESC')->paginate(10);
            } else {
                $data = Grammar::orderBy('id', 'DESC')->paginate(10);
            }
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
        return view('pages.admin.grammar.topic.detail', compact('id'));
    }

    public function detailTopicData(Request $request, $id)
    {
        try {
            $query = new Grammar();
            $data = $query->where('id', $id)->with(['QuestionGrammar' => function ($question) {
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
            DB::beginTransaction();
            $grammar = Grammar::create([
                "name" => $request->name,
                "description" => $request->description,
                "is_exam" => $request->isExam
            ]);
            $dataQuestion = $request->dataQuestion;
            foreach ($dataQuestion as $key => $value) {
                $res = QuestionGrammar::create([
                    "id" => $value['id'],
                    "question" => $value['question'],
                    "level" => $value['level'],
                    "type" => $value['type']
                ]);
                $query = new Grammar();
                $query->find($grammar->id)->QuestionGrammar()->attach(
                [
                    'question_granmmar_id' => $res->id
                ]);
                if ($res->type == 1) {
                    $res->right_answers()->create([
                        "answer_id" => $value["answer"]
                    ]);
                }

                foreach ($dataQuestion[$key]['dataAns'] as $keyAds => $item) {
                    QuestionGrammar::find($value['id'])->answers()->create([
                        "id" => $item['idAns'],
                        "text" => $item['text'],
                        "answer_id" => $item['idAns'],
                    ]);
                }
            }
            DB::commit();
            
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Create topic successfully !"
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Create topic failed !"
            ]);
        }


    }

    public function addQuestionToTopic(Request $request)
    {
        try {
            $query = new Grammar();
            $query->find($request->idTopic)->QuestionGrammar()->attach(
                [
                    'question_grammar_id' => $request->idQues
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
            $query = new Grammar();
            $query->find($request->idTopic)->QuestionGrammar()->detach(
                [
                    'question_grammar_id' => $request->idQues
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
            $grammar = Grammar::find($request->id);
            $grammar->QuestionGrammar()->detach();
            $grammar->delete();
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
            $grammar = Grammar::find($request->id);
            $grammar->update(
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
        return view('pages.admin.grammar.question.index');
    }

    public function getAllInfoQuestion(Request $request)
    {
        try {
            $query = new QuestionGrammar();
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
        return view('pages.admin.grammar.question.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            foreach ($data as $key => $value) {
                $res = QuestionGrammar::create([
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
                    QuestionGrammar::find($value['id'])->answers()->create([
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
            $grammar = Grammar::whereId($request->id)->first();
            $grammar->update([
                'name' => $request->name,
                'description' => $request->description,
                'is_exam' => $request->is_exam,
            ]);
            if (!$request->is_exam) {
                LevelGrammar::where('grammar_id', $request->id)->delete();
            }
            $dataQuestion = ($request->dataQuestion);
            $questionVocab = $grammar->QuestionGrammar()->get()->toArray();
            $toDelete = collect($questionVocab)->whereNotIn('id', collect($dataQuestion)->pluck('id'))->all();

            if (count($toDelete)) {
                foreach($toDelete as $item) {
                    QuestionGrammar::whereId($item['id'])->delete();
                }
            }
            foreach ($dataQuestion as $key => $value) {
                $check = QuestionGrammar::whereId($value['id'])->exists();
                if (!$check) {
                    $question = $grammar->QuestionGrammar()->create([
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
                    QuestionGrammar::whereId($value['id'])->first()->update([
                        "question" => $value['question'],
                        "level" => $value['level'],
                        "type" => $value['type']
                    ]);
                    if ($value['answer']) {
                        QuestionGrammar::whereId($value['id'])->first()->right_answers()->update([
                            "answer_id" => $value["answer"]
                        ]);
                    }
                    QuestionGrammar::whereId($value['id'])->first()->answers()->delete();
                    foreach ($value['dataAns'] as $keyAds => $valueAns) {
                        QuestionGrammar::whereId($value['id'])->first()->answers()
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
                "message" => "Sửa câu hỏi thành công !"
            ];
        } catch (\Exception $e) {
            Log::error($e);
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
            AnswerGrammar::find($request->id)->delete();
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
            QuestionGrammar::find($request->id)->delete();
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
