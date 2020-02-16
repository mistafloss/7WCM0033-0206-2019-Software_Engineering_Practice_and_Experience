<?php

namespace Modules\Command\Providers;


use Illuminate\Support\ServiceProvider;
use Modules\Command\GenerateModule\GenerateModuleCommand;


class CommandServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->commands([
            GenerateModuleCommand::class
        ]);
    }

}