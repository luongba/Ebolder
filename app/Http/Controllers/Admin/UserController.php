<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserUpdate;
use App\models\User\HistoryExam;
use App\models\User\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(){
        return view('pages.admin.user.index');
    }
    public function create(){
        return view('pages.admin.user.create');
    }
    public function edit($id){
        return view('pages.admin.user.edit', compact('id'));
    }
    public function getAllUser(){
        try {
            $isAdmin = true;
            $users = User::all();
            if (Gate::allows('User_Edit')) {
                $isAdmin = true;
            } else {
                $isAdmin = false;
            }
            return response()->json([
                "status" => 200,
                'isAdmin'=> $isAdmin,
                "errorCode" => 0,
                "data" => $users,
                "message" => "Lấy user Thành công!"
            ]);
        }catch (\Exception $e){
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }

    }
    public function registerUserApi(UserRegister $request){
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $validate["password"] = bcrypt($validate["password"]);
            $user = User::create($validate);
            foreach ( $request->roles as $item){
                $user->roles()->attach([
                    "role_id" => $item
                ]);
            }
            DB::commit();


            return response()->json([
                'status'=>200,
                'user' =>$user,
                'message'=>'register success'
            ], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>500,
                'message'=>'Lỗi máy chủ '
            ], 200);
        }



    }
    public function updateUserApi(UserUpdate $request, $id){
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $user = User::whereId($id)->first()->update($validate);
            $temp = [];
            foreach ( $request->roles as $item){
                array_push($temp, $item);
            }
                User::whereId($id)->first()->roles()->sync($temp);

            DB::commit();


            return response()->json([
                'status'=>200,
                'user' =>$user,
                'message'=>'update success'
            ], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>500,
                'message'=>'Lỗi máy chủ '
            ], 200);
        }




    }
    public function deleteUserApi(UserUpdate $request, $id){
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            User::whereId($id)->first()->roles()->detach();
            $user = User::whereId($id)->first()->delete($validate);


            DB::commit();


            return response()->json([
                'status'=>200,
                'user' =>$user,
                'message'=>'delete success'
            ], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=>500,
                'message'=>'Lỗi máy chủ '
            ], 200);
        }




    }
    public function getDetailUser($id){
        try {
            $users = User::whereId($id)->with('roles')->first();

            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $users,
                "message" => "Lấy user Thành công!"
            ]);
        }catch (\Exception $e){
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }



    }
    public function history($id){
        try {
            $history = HistoryExam::where('user_id', $id)->orderBy('created_at', 'desc')->take(20)->get();
            return view('pages.admin.user.history', compact('history'));
        }catch (\Exception $e){
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }
    }
}
