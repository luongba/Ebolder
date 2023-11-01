<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Vocabulary\AnswerVocabulary;
use App\models\Vocabulary\LevelVocabulary;
use App\models\Vocabulary\QuestionVocabulary;
use App\models\Vocabulary\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class VocabularyController extends Controller
{
    public function index()
    {
        return view('pages.admin.vocabulary.topic.index');
    }

    public function ListTopic(Request $request)
    {
        try {
            if ($request->is_exam) {
                $data = Vocabulary::where('is_exam', 1)->orderBy('name', 'asc')->paginate(10);
            } else {
                if ($request->search) {
                    $search = strtolower($request->search); // Convert to lowercase
                    $data = Vocabulary::whereRaw('LOWER(name) LIKE ?', ['%' . $search . '%'])
                        ->orderBy('name', 'asc')->paginate(10);
                } else {
                    $data = Vocabulary::orderBy('name', 'asc')->paginate(10);
                }
            }
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $data,
                "message" => "Lấy danh sách topic thành công !"
            ]);
        } catch (\Exception $e) {
            Log::error($e);
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
            $query = new Vocabulary();
            $data = $query->where('id', $id)->with(['QuestionVocabulary' => function ($question) {
                $question->with('answers')->with('right_answers');
            
            }])->first();
            DB::commit();
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
            $query->find($request->idTopic)->QuestionVocabulary()->attach(
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
            $query->find($request->idTopic)->QuestionVocabulary()->detach(
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
            $vocabulary->QuestionVocabulary()->detach();
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
            $dataTopic = $data['topicData'];
            $voca = Vocabulary::create([
                "name" => $dataTopic['name'],
                "description" => $dataTopic['description'] ?? '',
                "is_exam" => $dataTopic['isExam'],
            ]);
            if (!$request->is_exam) {
                LevelVocabulary::where('vocabulary_id', $request->id)->delete();
            }
            $dataQuestion = $data['dataQuestion'];
            foreach ($dataQuestion as $key => $value) {
                $res = QuestionVocabulary::create([
                    "id" => $value['id'],
                    "question" => $value['question'],
                    "level" => $value['level'],
                    "type" => $value['type']
                ]);
                $query = new Vocabulary();
                $query->find($voca->id)->QuestionVocabulary()->attach(
                [
                    'question_vocabulary_id' => $res->id
                ]);
                if ($res->type == 1) {
                    $res->right_answers()->create([
                        "answer_id" => $value["answer"]
                    ]);
                }


                foreach ($dataQuestion[$key]['dataAns'] as $keyAds => $item) {
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
            $vocabulary = Vocabulary::whereId($request->id)->first();
            $vocabulary->update([
                'name' => $request->name,
                'description' => $request->contentReading,
                'is_exam' => $request->is_exam,
            ]);
            if (!$request->is_exam) {
                LevelVocabulary::where('vocabulary_id', $request->id)->delete();
            }

            $dataQuestion = ($request->dataQuestion);
            $questionVocab = $vocabulary->QuestionVocabulary()->get()->toArray();
            
            $toDelete = collect($questionVocab)->whereNotIn('id', collect($dataQuestion)->pluck('id'))->all();
            if (count($toDelete)) {
                foreach($toDelete as $item) {
                    QuestionVocabulary::whereId($item['id'])->delete();
                }
            }
            foreach ($dataQuestion as $key => $value) {
                $check =QuestionVocabulary::whereId($value['id'])->exists();
                if (!$check) {
                    $question = $vocabulary->QuestionVocabulary()->create([
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
                    QuestionVocabulary::whereId($value['id'])->first()->update([
                        "question" => $value['question'],
                        "level" => $value['level'],
                        "type" => $value['type']
                    ]);
                    if ($value['answer']) {
                        QuestionVocabulary::whereId($value['id'])->first()->right_answers()->update([
                            "answer_id" => $value["answer"]
                        ]);
                    }
                    QuestionVocabulary::whereId($value['id'])->first()->answers()->delete();
                    foreach ($value['dataAns'] as $keyAds => $valueAns) {
                        QuestionVocabulary::whereId($value['id'])->first()->answers()
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
                "message" => "Edit question successfully!"
            ];
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Failed action !"
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
