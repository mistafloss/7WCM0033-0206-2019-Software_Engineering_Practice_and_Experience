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
    }

    public function indexSearchProperty(Request $request)
    {
       $location = $request->get('location');
       $intent = $request->get('intent');
       $properties = WebsiteService::indexSearchProperty($location,$intent);
       return view('website.pages.property', compact('properties'));
    }

    public function allProperties(Request $request)
    {
        $properties = WebsiteService::getAllProperties();
        return view('website.pages.property', compact('properties'));
    }
}
