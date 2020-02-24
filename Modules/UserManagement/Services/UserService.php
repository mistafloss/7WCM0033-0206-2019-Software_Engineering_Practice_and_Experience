<?php 

namespace Modules\UserManagement\Services;

use Modules\UserManagement\Entities\User;
use Modules\UserManagement\Entities\Role;

use Hash;

class UserService
{
    public static function createUser($data)
    {
        try
        {
            $data['password']  = Hash::make($data['password']);
            $user = User::create($data);
            return $user;

        }catch(\Exception $ex){
            return $ex->getMessage();
        }
    }
}