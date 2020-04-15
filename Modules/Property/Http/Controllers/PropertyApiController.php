<?php

namespace Modules\Property\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Property\Services\PropertyService;
use Validator;
use Illuminate\Http\Request;


class PropertyApiController extends BaseController
{
    use  ValidatesRequests, AuthorizesRequests;
    /**
     * Create new Property Category object
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPropertyCategory(Request $request)
    {
        $rules = array(
            'name' => 'required',
        );
        $messages = array('name.required' => 'This field is required');
        $this->validate( $request , $rules, $messages);
        $data = $request->all();
        $propertyCategory = PropertyService::createCategory($data);
        return response()->json(['success' => true, 'data' => $propertyCategory]);
    }

    
    /**
     * View Property Category 
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewPropertyCategory($id)
    {
        $category = PropertyService::getCategoryById($id);
        return response()->json(['success' => true, 'data' => $category]);
    }


    /**
     * Update a Property Category
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePropertyCategory(Request $request)
    {
        $rules = array(
            'name' => 'required',
        );
        $messages = array('name.required' => 'This field is required');
        $this->validate( $request , $rules, $messages);
        $data = $request->except('_token');

        $category = PropertyService::updatePropertyCategory($data);

         return response()->json(['success' => true, 'data' => $category]);
    }

    /**
     * Create a Property
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProperty(Request $request)
    {
        

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
