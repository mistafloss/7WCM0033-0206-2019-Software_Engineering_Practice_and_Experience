<?php

namespace Modules\UserManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;


class UserManagementServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /* TODO: SET NAMESPACE HERE */
    protected $namespace = 'Modules\UserManagement\Http\Controllers';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        /* TODO: ADD ROUTE FILES HERE */
        $this->loadRoutesFrom(base_path('Modules/UserManagement/Http/routes.php'));
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
