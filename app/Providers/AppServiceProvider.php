<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('linkedin_id', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z0-9.-]+\-[a-zA-Z]{2,}$/', $value);
        });

        Validator::extend('valid_host', function ($attribute, $value, $parameters, $validator) {
            // Customize the regular expression pattern to match valid hosts/domains
            return preg_match('/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value);
        });

    }
}
