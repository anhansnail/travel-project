<?php

namespace VMA\Admin;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        require __DIR__ . '/../vendor/autoload.php';

        require __DIR__ . '/helpers.php';
        require __DIR__ . '/Menu.php';

        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'admin');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        //  $this->loadSeed
        $this->loadTranslationsFrom(__DIR__.'/translations','admin');
        $this->publishes([
            __DIR__.'/translations' => resource_path('lang'),
        ]);

//        $this->publishes([
//            __DIR__.'/public' => public_path('vendor/user'),
//        ], 'public');

        Schema::defaultStringLength(191);
//        $user = Auth::user();
//        echo "<pre>";
//        var_dump($user);
//        echo "</pre>";exit;
//        View::share('key', 'value');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
