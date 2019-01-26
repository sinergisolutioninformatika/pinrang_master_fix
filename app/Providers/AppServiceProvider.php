<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use Auth;
use App\Walidata;

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
      View::composer('*', function($view){
        $view->with('auth', Auth::user());
        $model = [];
        if (!is_null(Auth::user())) {
            $kode = Auth::user()->skpd->id;   
            $model = Walidata::where('skpd_id',$kode)->get();
        }

        $view->with('menu',$model);
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
