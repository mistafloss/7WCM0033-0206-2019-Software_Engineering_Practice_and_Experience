<?php

namespace Modules\BackOffice\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class BackOfficeController extends BaseController
{
    public function __construct(){
        
    }
    public function index()
    {
        return view('backoffice.pages.login');
    }

    public function dashboard()
    {
        return view('backoffice.pages.dashboard');
    }
}
