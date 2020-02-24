<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\UserManagement\Traits\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasPermissionsTrait;

    protected $table = 'users';
    /* The attribute that are mass assignable */
    protected $fillable = [
        'first_name', 'last_name','username','email', 'password','role_id'
    ];


}
