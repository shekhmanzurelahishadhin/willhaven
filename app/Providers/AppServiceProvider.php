<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\WebsiteLogo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

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
        Schema::defaultStringLength(191);
        // paginator::useBootstrap();
        View::composer('front-page.includes.header',function ($view){
           $view -> with('languages',Language::all());
        });
        View::composer('front-page.includes.header',function ($view){
           $view -> with('logo',WebsiteLogo::latest()->first());
        });
        View::composer('front-page.includes.footer',function ($view){
           $view -> with('languages',Language::all());
        });
    }
}
