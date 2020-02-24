<?php

namespace Modules\Authentication\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;



class AuthenticationApiController extends BaseController
{

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


    /**
     * Create new Foo object
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        /** DO VALIDATE */

        $data = $request->except('_token');

        $newObject = Foo::create($data);
        return response()->json(['success' => true, 'data' => $newObject]);
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
