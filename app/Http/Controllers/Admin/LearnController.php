<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Learn\AnswerLesson;
use App\models\Learn\Learn;
use App\models\Learn\QuestionLesson;
use App\models\Learn\RightAnswerLesson;
use App\models\Media\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LearnController extends Controller
{
    public function index()
    {
        return view('pages.admin.learn.topic.index');
    }

    public function createTopic()
    {
        return view('pages.admin.learn.topic.create');
    }

//    public function createTopic(Request $request){
//        dd($request);
//        try {
//            if ($request->has('file')) {
//                $file = $request->file;
//                $file_name = time() . '_' . $file->getClientOriginalName();
//                $file->move(public_path('upload/video'), $file_name);
//
//            }
//            $audio = Media::create([
//                'name' => $file->getClientOriginalName(),
//                'audio' => $file_name
//            ]);
//            return response()->json([
//                "status" => 200,
//                "errorCode" => 0,
//                "audio_id" => $audio->id,
//                "message" => "Thêm media Thành công!"
//            ]);
//        } catch (\Throwable $th) {
//            return response()->json([
//                "status" => 400,
//                "errorCode" => 400,
//                "message" => "Thêm media Thất bại!"
//            ]);
//        }
//    }


    public function ListTopic()
    {
        try {
            $data = Learn::all();
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

    public function deleteTopic(Request $request)
    {
        try {
            DB::beginTransaction();
            $learn = Learn::whereId($request->id)->first();
            $learn->delete();
            $question = QuestionLesson::where('learn_id', $request->id)->get();
            foreach ($question as $item) {
                AnswerLesson::where('question_id', $item->id)->delete();

                RightAnswerLesson::where('question_id', $item->id)->delete();
            }
            QuestionLesson::where('learn_id', $request->id)->delete();


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

    public function createTopicApi(Request $request)
    {


        try {
            DB::beginTransaction();
            $lesson = null;
            $dataQuestion = null;
            if ($request->has('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/video'), $file_name);
                $lesson = Learn::create([
                    'name' => $request->name,
                    'content' => $request->contentReading,
                    'url_media' => $_SERVER['SERVER_NAME'] . ':8000/upload/video/' . $file_name,
                    'type_video' => 'upload'
                ]);
                $dataQuestion = json_decode($request->dataQuestion);
                foreach ($dataQuestion as $key => $value) {
                    $question = $lesson->QuestionLesson()->create([
                        'question' => $value->question,
                        'level' => $value->level,
                        'type' => $value->type
                    ]);
                    foreach ($value->dataAns as $keyAns => $valueAns) {
                        $question->AnswerLesson()->create([
                            'id' => $valueAns->idAns,
                            'id_answer' => $valueAns->idAns,
                            'text' => $valueAns->text
                        ]);
                    }
                    if ($value->answer) {
                        $question->RightAnswerLesson()->create([
                            'answer_id' => $value->answer
                        ]);
                    }


                }
            } else {
                $lesson = Learn::create([
                    'name' => $request->name,
                    'content' => $request->contentReading,
                    'url_media' => $request->linkMedia,
                    'type_video' => 'social'
                ]);
                $dataQuestion = ($request->dataQuestion);
                foreach ($dataQuestion as $key => $value) {
                    $question = $lesson->QuestionLesson()->create([
                        'question' => $value['question'],
                        'level' => $value['level'],
                        'type' => $value['type']
                    ]);
                    foreach ($value['dataAns'] as $keyAns => $valueAns) {
                        $question->AnswerLesson()->create([
                            'id' => $valueAns['idAns'],
                            'text' => $valueAns['text']
                        ]);
                    }
                    if ($value['answer']) {
                        $question->RightAnswerLesson()->create([
                            'answer_id' => $value['answer']
                        ]);
                    }


                }
            }
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "audio_id" => $lesson->id,
                "message" => "Thêm media Thành công!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm media Thất bại!"
            ]);
        }


    }

    public function detailTopic($id)
    {
        return view('pages.admin.learn.topic.detail', compact('id'));
    }

    public function detailTopicApi($id)
    {
        try {
            $lesson = Learn::whereId($id)->with(['QuestionLesson' => function ($question) {
                $question->with('AnswerLesson')->with('RightAnswerLesson');
            }])->first();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                'data' => $lesson,
                "message" => "Lấy chi tiết topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Lấy chi tiết topic thất bại !"
            ]);
        }

    }

    public function addQuestionSingle(Request $request)
    {
        try {
            $check = QuestionLesson::where('id', $request->id)->exists();
            if ($check) {
                $question = QuestionLesson::where('id', $request->id)->first();
                $question->update(
                    [
                        "question" => $request->question,
                        "level" => $request->level,
                        'type' => $request->type,
                    ]
                );
                if ($request->type == 1) {
                    foreach ($request->dataAns as $keyAds => $item) {
                        $ans = $question->AnswerLesson()->where("id_answer", $item['id'])->first();
                        if (isset($ans)) {
                            $ans->update([
                                "text" => $item['text'],
                            ]);
                        } else {
                            $question->AnswerLesson()->create([
                                "id" => $item['id'],
                                "id_answer" => $item['id'],
                                "text" => $item['text']
                            ]);
                        }


                    }
                    $question->RightAnswerLesson()->update([
                        "answer_id" => $request->right_answers
                    ]);
                } else {
                    $question->AnswerLesson()->delete();
                    foreach ($request->dataAns as $keyAds => $item) {
                        $question->AnswerLesson()->create([
                            "id" => $item['id'],
                            "id_answer" => $item['id'],
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
                $questionCreate = QuestionLesson::create([
                    'id' => $request->id,
                    'learn_id' => $request->learn_id,
                    'question' => $request->question,
                    'level' => $request->level,
                    'type' => $request->type,
                ]);
                foreach ($request->dataAns as $keyAds => $item) {
                    $questionCreate->AnswerLesson()->create([
                        "id" => $item['id'],
                        "id_answer" => $item['id'],
                        "text" => $item['text']
                    ]);


                }
                if ($request->type == 1) {
                    $questionCreate->RightAnswerLesson()->create([
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

    public function deleteQuestionData(Request $request)
    {
        try {
            $query = new QuestionLesson();
            $question = $query->where('id', $request->id)->first();
            if (isset($question)) {
                $question->delete();
                AnswerLesson::where('question_id', $question->id)->delete();
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

    public function addQuestionMultiple(Request $request)
    {

        try {
            $lesson = Learn::whereId($request->id)->first();
            $dataQuestion = ($request->dataQuestion);
            if ($request->has('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/video'), $file_name);
                $lesson->update([
                    'name' => $request->name,
                    'content' => $request->contentReading,
                    'url_media' => $_SERVER['SERVER_NAME'] . ':8000/upload/video/' . $file_name,
                    'type_video' => $request->type_video
                ]);
                $dataQuestion = json_decode($request->dataQuestion, true);

            } else {
                $lesson->update([
                    'name' => $request->name,
                    'content' => $request->contentReading,
                    'url_media' => $request->linkMedia,
                    'type_video' => $request->type_video
                ]);
            }


            foreach ($dataQuestion as $key => $value) {
                $check = QuestionLesson::whereId($value['id'])->exists();
                if (!$check) {
                    $question = $lesson->QuestionLesson()->create([
                        'question' => $value['question'],
                        'level' => $value['level'],
                        'type' => $value['type']
                    ]);
                    foreach ($value['dataAns'] as $keyAns => $valueAns) {
                        $question->AnswerLesson()->create([
                            'id' => $valueAns['idAns'],
                            'id_answer' => $valueAns['idAns'],
                            'text' => $valueAns['text']
                        ]);
                    }
                    if ($value['answer']) {
                        $question->RightAnswerLesson()->create([
                            'answer_id' => $value['answer']
                        ]);
                    }
                } else {
                    QuestionLesson::whereId($value['id'])->first()->update([
                        "id" => $value['id'],
                        "learn_id" => $lesson->id,
                        "question" => $value['question'],
                        "level" => $value['level'],
                        "type" => $value['type']
                    ]);
                    QuestionLesson::whereId($value['id'])->first()->RightAnswerLesson()->update([
                        "answer_id" => $value["answer"]
                    ]);
                    QuestionLesson::whereId($value['id'])->first()->AnswerLesson()->delete();
                    foreach ($dataQuestion[$key]['dataAns'] as $keyAds => $valueAns) {
                        QuestionLesson::whereId($value['id'])->first()->AnswerLesson()
                            ->create([
                                'id' => $valueAns['idAns'],
                                'id_answer' => $valueAns['idAns'],
                                'text' => $valueAns['text']
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
