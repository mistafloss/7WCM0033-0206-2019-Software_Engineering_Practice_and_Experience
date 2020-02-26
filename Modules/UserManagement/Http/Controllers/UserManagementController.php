<?php

namespace Modules\UserManagement\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\UserManagement\Services\UserService;
use Auth;

class UserManagementController extends BaseController
{
    private $user;
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->user = $request->user();
    }

    public function index(Request $request)
    {
        
        return view('backoffice.pages.usermanagement.index');
    }

    public function addUser()
    {
        return view('backoffice.pages.usermanagement.adduser');
    }

    public function rolesIndex(Request $request)
    {
        $this->user = $request->user();
        if(!$this->user->can('can_manage_roles_and_permissions'))
        {
            return redirect()->route('backofficeDashboard')->withFail('Access denied!');
        }else{
            $roles = UserService::getAllRoles();
            return view('backoffice.pages.rolesandpermissions.roles_index', compact('roles'));
        }
    }

    public function permissionsIndex(Request $request)
    {
        $this->user = $request->user();
        if(!$this->user->can('can_manage_roles_and_permissions'))
        {
            return redirect()->route('backofficeDashboard')->withFail('Access denied!');
        }else{
            $permissions = UserService::getAllPermissions();
            return view('backoffice.pages.rolesandpermissions.permissions_index', compact('permissions'));
        }
    }

}
