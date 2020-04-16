<?php

namespace Modules\Property\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Property\Services\PropertyService;

use Illuminate\Routing\Controller as BaseController;

class PropertyController extends BaseController
{
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
        //validate
        //send valid data to api controller
        //api controller updateProperty method will return true in json payload if update is sucessful
        //this method will listen for the success in the json payload and redirect to properties index
    }
}
