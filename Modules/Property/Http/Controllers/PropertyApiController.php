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
       
        $rules = array(
            'listing_title' => 'required',
            'house_number' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'property_features' => 'required',
            'property_description' => 'required',
            'property_category_id' => 'required',
            'property_price' => 'required|numeric',
            'property_status' => 'required',
            'publish_property' => 'required',
            'property_images' => 'required',
            'no_of_bedrooms' => 'required',
            'property_images.*' => 'mimes:png,gif,jpeg,jpg'
        );

         $messages = [
             'property_category_id.required' => 'The property type field is required',
             'property_images.required' => 'Please upload at least one image for the property',
             'no_of_bedrooms.required' => 'Please select the number of bedrooms'
            ];
         $this->validate($request,$rules, $messages);
         $data = $request->all();
        $propertySaved = PropertyService::createProperty($data);
        return response()->json(['success' => true, 'data' => $propertySaved]);
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
