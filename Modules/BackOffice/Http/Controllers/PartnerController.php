<?php

namespace Modules\BackOffice\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class PartnerController extends BaseController
{
    public function __construct(){
        
    }
    public function index()
    {
        return view('backoffice.pages.partners.index');
    }

    public function addNew(Request $request)
    {
        // $user = $request->user();
        // //dd($user);
        // //dd($user->can('can_cancel_property_sale'));
        return view('backoffice.pages.partners.newpartner');
    }
}
