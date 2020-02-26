<?php 

namespace Modules\UserManagement\Services;

use Modules\UserManagement\Entities\User;
use Modules\UserManagement\Entities\Role;
use Modules\UserManagement\Entities\Permission;

use Hash;

class UserService
{
    public static function createUser($data)
    {
        try
        {
            $data['password']  = Hash::make($data['password']);
            $role = Role::find($data['role_id']);
            $user = User::create($data);
            if($user)
            {
                $user->roles()->save($role);
            }
            return $user;
        }catch(\Exception $ex){
            return $ex->getMessage();
        }
    }

    public static function getAllRoles()
    {
        return Role::all();
    }

    public static function getAllPermissions()
    {
        return Permission::all();
    }
}