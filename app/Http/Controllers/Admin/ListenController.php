<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Listen\AnswerListening;
use App\models\Listen\AudioListening;
use App\models\Listen\Listening;
use App\models\Listen\QuestionListening;
use App\models\Vocabulary\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use mysql_xdevapi\Exception;

class ListenController extends Controller
{
    public function listQuestion()
    {
            return view('pages.admin.listening.question.index');

    }

    public function createQuestion()
    {
        return view('pages.admin.listening.question.create');
    }

    public function createAudioAndQuestion(Request $request)
    {
        try {
            if ($request->has('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/audio'), $file_name);

            }
            $audio = AudioListening::create([
                'name' => $file->getClientOriginalName(),
                'audio' => $file_name
            ]);
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "audio_id" => $audio->id,
                "message" => "Thêm media Thành công!"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm media Thất bại!"
            ]);
        }
    }

    public function storeQuestion(Request $request)
    {
        try {
            $data = $request->all();
            foreach ($data as $key => $value) {
                $res = QuestionListening::create([
                    "id" => $value['id'],
                    "audio_listening_id" => $value['audio_id'],
                    "question" => $value['question'],
                    "level" => $value['level']
                ]);
                $res->rightAnswers()->create([
                    "answer_id" => $value["answer"]
                ]);

                foreach ($data[$key]['dataAns'] as $keyAds => $item) {
                    QuestionListening::find($value['id'])->answerListening()->create([
                        "id" => $item['idAns'],
                        "text" => $item['text']
                    ]);
                }
            }
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm câu hỏi thành công !"
            ];
        } catch (\Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm câu hỏi thất bại !"
            ];
        }


    }

    public function getAllAudio(Request $request)
    {
        try {
            $query = new AudioListening();
            $dataAll = $query->with('questionListening')->get();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $dataAll,


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

    public function editQuestion($id)
    {
        return view('pages.admin.listening.question.detail', compact('id'));
    }

    public function detaiQuestion($id)
    {
        try {
            $query = new AudioListening();
            $dataAll = $query->whereId($id)->with(['questionListening' => function ($question) {
                $question->with('answerListening')->with('rightAnswers');
            }])->first();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $dataAll,


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

    public function destroyAns(Request $request)
    {
        try {
            AnswerListening::find($request->id)->delete();
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

    public function updateQuestion(Request $request)
    {
        try {
            $res = QuestionListening::where('id', $request->id)->first();
            $res->update(
                [
                    "question" => $request->question,
                    "level" => $request->level
                ]
            );
            foreach ($request->dataAns as $keyAds => $item) {
                $ans = $res->answerListening()->find($item['id']);
                if (isset($ans)) {
                    $ans->update([
                        "text" => $item['text']
                    ]);
                } else {
                    $res->answerListening()->create([
                        "id" => $item['id'],
                        "text" => $item['text']
                    ]);
                }


            }
            $res->rightAnswers()->find($request->right_answers["id"])->update([
                "answer_id" => $request->right_answers["answer_id"]
            ]);
            return [
                "status" => 200,
                "errorCode" => 0,
                "message" => "Sửa câu hỏi thành công !"
            ];
        } catch (\Exception $e) {
            return [
                "status" => 400,
                "errorCode" => 400,
                "message" => "Sửa câu hỏi thất bại !"
            ];
        }


    }

    public function updateAudio(Request $request, $id)
    {
        try {
            if ($request->has('file')) {
                $file = $request->file;
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/audio'), $file_name);

            }
            $audio = AudioListening::whereId($id)->first();

            $audio->update([
                'name' => $file->getClientOriginalName(),
                'audio' => $file_name,
            ]);
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "update media Thành công!"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "update media Thất bại!"
            ]);
        }
    }

    public function deleteAudio(Request $request)
    {
        try {
            $audio = AudioListening::whereId($request->id)->first();

            $audio->delete();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa media Thành công!"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa media Thất bại!"
            ]);
        }
    }

    public function topicList()
    {
        return view('pages.admin.listening.topic.index');
    }

    public function ListTopic()
    {
        try {
            $data = Listening::all();
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

    public function createTopic(Request $request)
    {

        try {
            Listening::create([
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

    public function detailTopic(Request $request, $id)
    {
        return view('pages.admin.listening.topic.detail', compact('id'));
    }

    public function detailTopicData(Request $request, $id)
    {
        try {
            $query = new Listening();
            $data = $query->where('id', $id)->with(['TopicAudioListen' => function ($item) {
                $item->with('questionListening');
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

    public function addAudioToTopic(Request $request)
    {
        try {
            $query = new Listening();
            $query->find($request->idTopic)->TopicAudioListen()->attach(
                [
                    'audio_listen_id' => $request->idAudio
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

    public function removeAudioFromTopic(Request $request)
    {
        try {
            $query = new Listening();
            $query->find($request->idTopic)->TopicAudioListen()->detach(
                [
                    'audio_listen_id' => $request->idAudio
                ]

            );
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa audio vào topic thành công !"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa audio vào topic thất bại !"
            ]);
        }
    }

    public function editTopic(Request $request)
    {
        try {
            $vocabulary = Listening::find($request->id);
            $vocabulary->update(
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

    public function deleteTopic(Request $request)
    {
        try {
            $vocabulary = Listening::find($request->id);
            $vocabulary->TopicAudioListen()->detach();
            $vocabulary->delete();
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
}
