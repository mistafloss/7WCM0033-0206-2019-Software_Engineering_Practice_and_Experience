<?php

namespace Modules\UserManagement\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Auth;

class UserManagementController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backoffice.pages.usermanagement.index');
    }

    public function addUser()
    {
       
        return view('backoffice.pages.usermanagement.adduser');
    }
}
