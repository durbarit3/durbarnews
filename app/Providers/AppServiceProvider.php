<?php

namespace App\Providers;

use App\Logo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\NewsPost;
use App\Unique;

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
       $brakingNews = NewsPost::where('braking_news', 1)->select(['id', 'slug', 'title'])->get();
       $latestnews = NewsPost::OrderBy('id', 'DESC')->where('is_deleted', 0)->where('status', 1)->limit(10)->get();
       $popularnews = NewsPost::where('popular_news', 1)->where('is_deleted', 0)->where('status', 1)->OrderBy('id', 'DESC')->limit(10)->get();
       $logos = Logo::first();
       $companyInfo = Unique::where('key', 'contact')->first();
        view()->share('brakingNews', $brakingNews);
        view()->share('latestnews', $latestnews);
        view()->share('popularnews', $popularnews);
        view()->share('logos', $logos);
        view()->share('companyInfo', $companyInfo);
    }
}
