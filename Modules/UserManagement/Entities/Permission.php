<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    public function users()
    {
        return $this->belongsToMany(\Modules\UserManagement\Entities\Role::class, 'roles_permissions');
    }
}