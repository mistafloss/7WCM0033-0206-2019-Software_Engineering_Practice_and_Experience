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
        return view('backoffice.pages.propertymanagement.properties');
    }

    public function addNewProperty(Request $request)
    {
        return view('backoffice.pages.propertymanagement.newproperty');
    }
}
