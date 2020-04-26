<?php

namespace Modules\Website\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Website\Services\WebsiteService;
use Illuminate\Routing\Controller as BaseController;

class WebsiteController extends BaseController
{
    public function index(Request $request)
    {
        return view('website.pages.index');
        //return view('website.pages.property');
    }

    public function search(Request $request)
    {
        //return $location;
       $location = $request->get('location');
       $intent = $request->get('intent');
       $properties = WebsiteService::searchProperty($location,$intent);
       return view('website.pages.property', compact('properties'));
    }

    public function property(Request $request)
    {
       return view('website.pages.property');
    }
}
