<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    // public function users()
    // {
    //     return $this->belongsToMany(\Modules\UserManagement\Entities\User::class);
    // }

    public function permissions()
    {
        return $this->belongsToMany(\Modules\UserManagement\Entities\Permission::class, 'roles_permissions');
    }
}