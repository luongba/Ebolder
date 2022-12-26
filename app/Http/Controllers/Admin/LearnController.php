<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Learn\Learn;
use App\models\Media\Media;
use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function index(){
        return view('pages.admin.learn.topic.index');
    }
    public function createTopic()
    {
        return view('pages.admin.learn.topic.create');
    }

    public function createMedia(Request $request){
        dd($request);
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
    }



    public function ListTopic(){
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
            $grammar = Learn::find($request->id);
//            $grammar->QuestitonGrammar()->detach();
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
    public function create(){

    }
}
