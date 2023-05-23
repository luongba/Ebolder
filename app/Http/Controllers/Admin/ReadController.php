<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Read\AnswerReading;
use Illuminate\Http\Request;
use App\models\Read\Reading;
use App\models\Read\QuestionReading;
use Illuminate\Support\Facades\DB;

class ReadController extends Controller
{
    public function listTopic()
    {
        return view('pages.admin.reading.index');
    }

    public function createTopic()
    {
        return view('pages.admin.reading.create');
    }

    public function storeTopic(Request $request)
    {

        try {
            DB::beginTransaction();
            $read = Reading::create([
                "name" => $request->name,
                "content" => $request->contentReading,
                "is_exam" => $request->isExam
            ]);
            foreach ($request->dataQuestion as $key => $value) {
                $res = $read->QuestionReading()->create([
                    "question" => $value['question'],
                    "level" => $value['level'],
                    'type' => $value['type']
                ]);
                if ($value['answer']) {
                    $res->RightAnswerReading()->create([
                        "answer_id" => $value["answer"]
                    ]);
                }


                foreach ($value['dataAns'] as $keyAds => $item) {
                    $res->AnswerReading()->create([
                        "id" => $item['idAns'],
                        'answer_id' => $item['idAns'],
                        "text" => $item['text']
                    ]);
                }
            }
            DB::commit();
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm topic thành công !"
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm topic thất bại !"
            ];
        }


    }

    public function listTopicApi()
    {
        try {
            $query = new Reading();
            $dataAll = $query->get();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $dataAll,


            ]);
        } catch (\Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
            ];
        }
    }

    public function deleteTopicApi(Request $request)
    {
        try {
            Reading::find($request->id)->delete();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa topic thành công !"


            ]);
        } catch (\Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa topic thất bại !"
            ];
        }
    }

    public function detailTopic($id)
    {
        return view('pages.admin.Reading.detail', compact('id'));
    }

    public function detailTopicData(Request $request, $id)
    {
        try {
            $query = new Reading();
            $data = $query->where('id', $id)->with(['QuestionReading' => function ($item) {
                $item->with('AnswerReading')->with('RightAnswerReading');
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

    public function deleteQuestionData(Request $request)
    {
        try {
            $query = new QuestionReading();
            $question = $query->where('id', $request->id)->first();
            if (isset($question)) {
                $question->delete();
                AnswerReading::where('question_id', $question->id)->delete();
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Xóa Question thành công !"
                ]);
            } else {
                return response()->json([
                    "status" => 100,
                    "errorCode" => 0,
                    "message" => "Question Xóa không tồn tại !"
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa Question thất bại !"
            ]);
        }

//        return view('pages.admin.vocabulary.topic.detail');
    }

    public function deleteAnswerData(Request $request)
    {
        try {
            $query = new AnswerReading();
            $question = $query->where('id', $request->id)->first();
            if (isset($question)) {
                $question->delete();
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Xóa Answer thành công !"
                ]);
            } else {
                return response()->json([
                    "status" => 100,
                    "errorCode" => 0,
                    "message" => "Answer Xóa không tồn tại !"
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa Answer thất bại !"
            ]);
        }

//        return view('pages.admin.vocabulary.topic.detail');
    }

    public function addQuestionSingle(Request $request)
    {
        try {
            $check = QuestionReading::where('id', $request->id)->exists();
            if ($check) {
                $question = QuestionReading::where('id', $request->id)->first();
                $question->update(
                    [
                        "question" => $request->question,
                        "level" => $request->level,
                        'type' => $request->type,
                    ]
                );
                if ($request->type == 1) {
                    foreach ($request->dataAns as $keyAds => $item) {
                        $ans = $question->AnswerReading()->find($item['id']);
                        if (isset($ans)) {
                            $ans->update([
                                "text" => $item['text']
                            ]);
                        } else {
                            $question->AnswerReading()->create([
                                "id" => $item['id'],
                                "text" => $item['text'],
                                "answer_id" => $request->right_answers
                            ]);
                        }


                    }

                    $question->RightAnswerReading()->update([
                        "answer_id" => $request->right_answers
                    ]);
                } else {
                    $question->AnswerReading()->delete();
                    foreach ($request->dataAns as $keyAds => $item) {
                        $question->AnswerReading()->create([
                            "id" => $item['id'],
                            "answer_id" => $item['id'],
                            "text" => $item['text']
                        ]);


                    }
                }
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Sửa question thành công !"
                ]);

            } else {
                $questionCreate = QuestionReading::create([
                    'id' => $request->id,
                    'reading_id' => $request->reading_id,
                    'question' => $request->question,
                    'level' => $request->level,
                    'type' => $request->type,
                ]);
                foreach ($request->dataAns as $keyAds => $item) {
                    $questionCreate->AnswerReading()->create([
                        "id" => $item['id'],
                        "answer_id" => $item['id'],
                        "text" => $item['text']
                    ]);


                }
                if ($request->type == 1) {
                    $questionCreate->RightAnswerReading()->create([
                        "answer_id" => $request->right_answers
                    ]);
                }
                return response()->json([
                    "status" => 200,
                    "errorCode" => 0,
                    "message" => "Thêm question thành công !"
                ]);
            }


        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thao tác thất bại !"
            ]);
        }
    }


    public function addQuestionMultiple(Request $request)
    {


        try {
            $read = Reading::whereId($request->id)->first();
            $dataQuestion = ($request->dataQuestion);
            $read->update([
                "name" => $request->name,
                "content" => $request->contentReading,
                "is_exam" => $request->isExam
            ]);
            foreach ($dataQuestion as $key => $value) {
                $check = QuestionReading::whereId($value['id'])->exists();
                if (!$check) {
                    $res = $read->QuestionReading()->create([
                        "question" => $value['question'],
                        "level" => $value['level'],
                        'type' => $value['type']
                    ]);
                    if ($value['answer']) {
                        $res->RightAnswerReading()->create([
                            "answer_id" => $value["answer"]
                        ]);
                    }
                    foreach ($value['dataAns'] as $keyAds => $item) {
                        QuestionReading::whereId($value['id'])->first()->AnswerReading()->create([
                            "id" => $item['idAns'],
                            "text" => $item['text'],
                            'answer_id' => $item['idAns'],
                        ]);
                    }
                } else {
                    QuestionReading::whereId($value['id'])->first()->update([
                        "id" => $value['id'],
                        "reading_id" => $read->id,
                        "question" => $value['question'],
                        "level" => $value['level'],
                        "type" => $value['type']
                    ]);

                    QuestionReading::whereId($value['id'])->first()->RightAnswerReading()->update([
                        "answer_id" => $value["answer"]
                    ]);
                    QuestionReading::whereId($value['id'])->first()->AnswerReading()->delete();
                    foreach ($dataQuestion[$key]['dataAns'] as $keyAds => $item) {
                        QuestionReading::whereId($value['id'])->first()->AnswerReading()
                            ->create([
                                'id' => $item['idAns'],
                                'answer_id' => $item['idAns'],
                                'text' => $item['text']
                            ]);
                    }
                }
            }

            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "thao tác thành công !"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thao tác thất bại !"
            ]);
        }

    }
}
