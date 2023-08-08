<?php
declare(strict_types=1);

use Carbon\Laravel\ServiceProvider;

class CoreOrderAppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $useCases = require __DIR__ . '/dependencyInjection/useCases.php';
        $repositories = require __DIR__ . '/dependencyInjection/repositories.php';

        foreach ([...$useCases, ...$repositories]  as $interface => $class) {
            $this->app->bind($interface, $class);
        }
    }
}