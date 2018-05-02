<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('arabic_only', function ($attribute, $value, $parameters, $validator) {
            return preg_match("/\p{Arabic}/u", $value);
        });
        Validator::extend('english_only', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[\w\d\s.,-]*$/', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
