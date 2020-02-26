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
     * List Foo objects
     *  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $per_page = $request->has('per_page') ? $request->get('per_page'): 10;
        return response()->json(['success' => true, 'data' => FooService::list($per_page)]);
    }

    protected function createValidation($request)
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
    }
    /**
     * Create new Foo object
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $this->createValidation($request);
        $data = $request->all();
        $user = UserService::createUser($data);
        return response()->json(['status' => 'success', 'data' => $user]);
    }   


    /**
     * View a Foo object
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($id)
    {
        $object = Foo::find($id);

       return response()->json(['success' => true, 'data' => $object]);
    }


    /**
     * Update a Foo object
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
         /** DO VALIDATE */

        $data = $request->except('_token');

        $object = Foo::find($id);

        $object->update($data);

         return response()->json(['success' => true, 'data' => $object]);
    }


    /**
     * Delete a Foo object
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $object_id = $request->get('foo_id');

        $object = Foo::find($object_id);

        $object->delete();

         return response()->json(['success' => true, 'data' => $object]);
    }
}
