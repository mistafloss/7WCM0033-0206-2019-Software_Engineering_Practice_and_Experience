<?php

namespace Modules\Property\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Modules\UserManagement\Entities\Permission;
use Gate;

class PropertyServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /* TODO: SET NAMESPACE HERE */
    protected $namespace = 'Modules\Property\Http\Controllers';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        /* TODO: ADD ROUTE FILES HERE */
        $this->loadRoutesFrom(base_path('Modules/Property/Http/routes.php'));
        Permission::get()->map(function ($permission){
            Gate::define($permission->slug, function($user) use ($permission){
                return $user->hasPermissionTo($permission);
            });
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /* SET UP ALIASES */
        $this->aliasManager();
    }

    public function aliasManager()
    {
        /* ALIAS MANAGER */
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();

            /* TODO: ADD ALIASES HERE */
        });
    }
}
