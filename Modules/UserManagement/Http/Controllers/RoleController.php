<?php

namespace Modules\UserManagement\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\UserManagement\Services\RoleService;
use Modules\UserManagement\Entities\Permission;


class RoleController extends BaseController
{
    public function view($id)
    {
        $role = RoleService::getRoleById($id);
        $role_permissions = $role->permissions;
        $permissions = Permission::all();
        return view('backoffice.pages.rolesandpermissions.edit_role', compact('role','role_permissions','permissions'));
    }

}