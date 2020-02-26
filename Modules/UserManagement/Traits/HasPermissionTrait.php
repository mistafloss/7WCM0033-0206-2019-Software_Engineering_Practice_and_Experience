<?php

namespace Modules\UserManagement\Traits;

use Modules\UserManagement\Entities\{Role, Permission};

trait HasPermissionsTrait
{

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    //give permission to individual user
    //use splat operator to pass a list of permissions we may wish to give to the user
    public function givePermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions));
        if($permissions === null)
        {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    //withdraw permission from individual user
    public function withdrawPermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions));
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function assignRole($role)
    {
        $this->roles()->save($role);
        return $this;
    }

    protected function getAllPermissions(array $permissions)
    {   
        return Permission::whereIn('slug', $permissions)->get();
    }

    protected function hasPermissionThroughRole($permission)
    {
        foreach($permission->roles as $role){
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }

    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }
    
    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole(...$roles)
    {
        foreach($roles as $role){
            if($this->roles->contains('name', $role)){
                return true;
            }
        }
        return false;
    }

}