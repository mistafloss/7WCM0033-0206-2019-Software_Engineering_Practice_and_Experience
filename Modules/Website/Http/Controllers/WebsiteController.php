<?php

namespace Modules\Website\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Website\Services\WebsiteService;
use Modules\Property\Services\PropertyService;
use Illuminate\Routing\Controller as BaseController;

class WebsiteController extends BaseController
{
    public function index(Request $request)
    {
        return view('website.pages.index');
    }

    public function searchProperty(Request $request)
    {
       $location = $request->get('location');
       $intent = $request->get('intent');
       $type = $request->get('type');
       $bedrooms = $request->get('bedrooms');
       $propertyCategories = PropertyService::getAllCategories();
       $properties = WebsiteService::searchProperty($location,$intent,$bedrooms,$type);
       //dd($properties);
      // die;
       return view('website.pages.property', compact('properties','propertyCategories'));
    }

    public function allProperties(Request $request)
    {
        $properties = WebsiteService::getAllProperties();
        $propertyCategories = PropertyService::getAllCategories();
        return view('website.pages.property', compact('properties','propertyCategories'));
    }

    public function propertyDetails($id)
    {
        $property = WebsiteService::getProperty($id);
        return view('website.pages.property_details', compact('property'));
    }
}
