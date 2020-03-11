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
        $role = RoleService::getRoleById($request->role_id);
        if($role->permissions()->sync($request->permission)){
            return redirect()->route('viewRole',$role->id)->withSuccess('Role Updated');
        }else{
            return redirect()->route('viewRole',$role->id)->withFail('Role Update failed!');
        }
    } 
}