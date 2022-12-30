<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\LevelTesting\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(){
        return view('pages.admin.level.index');
    }

    public function createLevel(Request $request){
        try {
            DB::beginTransaction();
            $level = Level::create([
                "name" => $request->name,
                "listening_id" => $request->listening_id,
                "reading_id" => $request->reading_id,
                "vocabulary_id" => $request->vocabulary_id,
                "grammar_id" => $request->grammar_id,
            ]);
            $level->Learn()->attach($request->lessons);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Thêm level Thành công!"
            ]);
        }catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Thêm level Thất bại!"
            ]);
        }

    }
    public function getAllLevel(Request $request){
        try {
            DB::beginTransaction();
            $level = Level::with('Learn')->get();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $level,
                "message" => "Lấy danh sách level Thành công!"
            ]);
        }catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Lấy danh sách level Thất bại!"
            ]);
        }

    }
    public function deleteLevel(Request $request){
        try {
            DB::beginTransaction();
            $level = Level::find($request->id)->delete();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $level,
                "message" => "Xóa level Thành công!"
            ]);
        }catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa level Thất bại!"
            ]);
        }

    }
    public function detailLevel(Request $request){


        try {
            DB::beginTransaction();
            $level = new Level();
            $level = $level->where('id',$request->id)->with('Learn')->first();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $level,
                "message" => "Xóa level Thành công!"
            ]);
        }catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "Xóa level Thất bại!"
            ]);
        }

    }
    public function updateLevel(Request $request){
        try {
            DB::beginTransaction();
            $level = Level::where('id', $request->id)->first();
            $level->update([
                "name" => $request->name,
                "listening_id" => $request->listening_id,
                "reading_id" => $request->reading_id,
                "vocabulary_id" => $request->vocabulary_id,
                "grammar_id" => $request->grammar_id,
            ]);
            $level->Learn()->sync($request->lessons);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "update level Thành công!"
            ]);
        }catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                "status" => 400,
                "errorCode" => 400,
                "message" => "update level Thất bại!"
            ]);
        }


    }
}
