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
            foreach ($question as $item){
                AnswerLesson::where('question_id',$item->id)->delete();

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
                    'url_media' => $file_name
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
                    'url_media' => $request->linkMedia
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
}
