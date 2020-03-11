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

    public static function updateUser($data)
    {
        try
        {
            $user = self::getUserById($data['id']);
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->username = $data['username'];
            $user->role_id = $data['role_id'];
            $user->email = $data['email'];
            if($user->save())
            {
                $user->roles()->sync( $user->role_id);
            }
            return $user;
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public static function getUserById($id)
    {
        return User::find($id);
    }

    public static function getAllRoles()
    {
        return Role::all();
    }

    public static function getAllPermissions()
    {
        return Permission::all();
    }

    public static function getAllUsers()
    {
        return User::all();
    }
}