<?php

namespace Modules\Property\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Property\Services\PropertyService;
use Modules\BackOffice\Services\PartnerService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

use Illuminate\Routing\Controller as BaseController;

class PropertyController extends BaseController
{
    use  ValidatesRequests;

    public function __construct(Request $request)
    {
       $this->middleware('auth');
    }

    public function categoryIndex(Request $request)
    {
        $categories = PropertyService::getAllCategories();
        return view('backoffice.pages.propertymanagement.property_categories', compact('categories'));
    }

    public function propertyIndex(Request $request)
    {   
        $properties = PropertyService::getAllProperties();
        return view('backoffice.pages.propertymanagement.properties', compact('properties'));
    }

    public function addNewProperty(Request $request)
    {
        $categories = PropertyService::getAllCategories();
        return view('backoffice.pages.propertymanagement.newproperty', compact('categories'));
    }

    public function showProperty($id)
    {
        $categories = PropertyService::getAllCategories();
        $property = PropertyService::getPropertyById($id);
        return view('backoffice.pages.propertymanagement.editproperty', compact('categories','property'));
    }

    public function updateProperty(Request $request)
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
            'property_images.*' => 'mimes:png,gif,jpeg,jpg'
        );
     
        $messages = [
            'property_category_id.required' => 'The property type field is required',
        ];

        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $propertyUpdated = PropertyService::updateProperty($data);
        if($propertyUpdated){
            return redirect()->route('propertyIndex')->with('propertyUpdateSuccess', 'Property successfully updated');
        }
    }

    public function deleteImage(Request $request)
    {
        $data = $request->all();
        if(PropertyService::deletePhoto($data)){
            return redirect()->route('showProperty', $data['property_id'])->with('imageDeleteSuccess', 'Photo successfully deleted');
        }
    }

    public function addNewTenancy()
    {
        $properties = PropertyService::getAllProperties();
        $partners = PartnerService::getAllPartners();
        return view('backoffice.pages.propertymanagement.add_tenancy', compact('properties','partners'));
    }

    public function getTenancies()
    {
        $properties = PropertyService::getAllProperties();
        return view('backoffice.pages.propertymanagement.tenancies', compact('properties'));
    }
}
