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
        $users = UserService::getAllUsers();
        return view('backoffice.pages.usermanagement.index', compact('users'));
    }

    public function addUser()
    {
        return view('backoffice.pages.usermanagement.adduser');
    }

    public function view($id)
    {
        $user = UserService::getUserById($id);
        return view('backoffice.pages.usermanagement.edit_user', compact('user'));
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
