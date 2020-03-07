<?php

namespace Modules\UserManagement\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\UserManagement\Services\RoleService;

use Validator;
use Illuminate\Http\Request;


class RoleApiController extends BaseController
{
    public function update(Request $request)
    {
        //$this->createValidation($request);
        $data = $request->all();
       // dd($request->permission);
        $role = RoleService::getRoleById($request->role_id);
        return $role->permissions()->sync($request->permission);

        //$user = UserService::createUser($data);
        //return response()->json(['status' => 'success', 'data' => $user]);
    } 
}