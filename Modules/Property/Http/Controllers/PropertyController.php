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
        $propertiesToLet = PropertyService::getPropertiesToLet();
        $partners = PartnerService::getTenants();
        return view('backoffice.pages.propertymanagement.add_tenancy', compact('propertiesToLet','partners'));
    }

    public function getTenancies()
    {
        $properties = PropertyService::getAllProperties();
        return view('backoffice.pages.propertymanagement.tenancies', compact('properties'));
    }

    public function activateNewTenancy(Request $request)
    {
        //validate
        $rules = array(
            'property_id' => 'required',
            'partner_id' => 'required',
            'start_date' => 'required|before:end_date',
            'end_date' => 'required',
            'deposit' => 'required|numeric',
        );

        $messages = [
            'property_id.required' => 'The Property field is required',
            'partner_id.required' => 'Please select the Principal tenant for the tenancy',
        ];
        
        $this->validate($request,$rules, $messages);
        $data = $request->all();
        $transaction = PropertyService::activateNewTenancy($data);
       // return $transaction;
        if($transaction){
            return redirect()->route('getTenancies')->with('tenancySuccess', 'New Tenancy successfully activated');;
        }
    }
}
