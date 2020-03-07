<?php 

namespace Modules\UserManagement\Services;

use Modules\UserManagement\Entities\User;
use Modules\UserManagement\Entities\Role;
use Modules\UserManagement\Entities\Permission;


class RoleService
{
     /**
     * Get all Roles 
     */
    public static function getAllRoles()
    {
        return Role::all();
    }
     
    /**
     * Get a Role by id 
     * @param $id
     */
    public static function getRoleById($id)
    {
        return Role::find($id);
    }
}