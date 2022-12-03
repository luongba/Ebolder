<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\User\Permision;
use App\models\User\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        return view('pages.admin.role.index');
    }

    public function create()
    {
        return view('pages.admin.role.create');
    }

    public function edit($id)
    {
        return view('pages.admin.role.edit', compact('id'));
    }

    public function getAllRole()
    {

        try {
            $roles = Role::all();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $roles,
                "message" => "Lấy role Thành công!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }
    }

    public function getAllPermision()
    {

        try {
            $permisions = new Permision();
            $permisions = $permisions->where('parent_id', 0)->with('permisionChild')->get();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $permisions,
                "message" => "Lấy permision Thành công!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }
    }

    public function createRolePermision(Request $request)
    {


        try {
            DB::beginTransaction();
            $role = Role::create([

                "name" => $request->name,
                "display_name" => $request->display_name,
            ]);
            $role->permisions()->attach($request->permisions);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $role,
                "message" => "Thêm role Thành công!"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }
    }

    public function getDetailRole($id)
    {

        try {
            $role = new role();
            $role = $role->where('id', $id)->with('permisions')->first();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "data" => $role,
                "message" => "Lấy role Thành công!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }
    }

    public function updateRolePermision(Request $request, $id)
    {


        try {
            DB::beginTransaction();
            Role::whereId($id)->first()->update([

                "name" => $request->name,
                "display_name" => $request->display_name,
            ]);
            Role::whereId($id)->first()->permisions()->sync($request->permisions);
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Sửa role Thành công!"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }
    }

    public function deleteRolePermision($id)
    {


        try {
            DB::beginTransaction();
            Role::whereId($id)->first()->permisions()->detach();
            Role::whereId($id)->first()->delete();
            DB::commit();
            return response()->json([
                "status" => 200,
                "errorCode" => 0,
                "message" => "Xóa role Thành công!"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => 500,
                "errorCode" => 500,
                "message" => "Lỗi máy chủ!"
            ]);
        }
    }

}
