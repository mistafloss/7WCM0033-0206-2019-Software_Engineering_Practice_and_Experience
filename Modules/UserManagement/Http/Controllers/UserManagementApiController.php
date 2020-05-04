<?php

namespace Modules\UserManagement\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\UserManagement\Services\UserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
use Illuminate\Http\Request;
use Auth;

class UserManagementApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create new User 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        );

        $messages = array('role_id.required' => 'Select a role for the user');
        $this->validate( $request , $rules, $messages);
        $data = $request->all();
        $user = UserService::createUser($data);
        return response()->json(['status' => 'success', 'data' => $user]);
    }   


    /**
     * Update a User 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        );
        $this->validate( $request , $rules);
        $data = $request->except('_token');
        UserService::updateUser($data);
        return redirect()->route('usermanagementIndex')->withSuccess('User Updated');
    }

}
