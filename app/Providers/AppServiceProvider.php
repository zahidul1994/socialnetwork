<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
use Event;

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
        //query log
//        if (env('APP_ENV') === 'local') {
//            DB::connection()->enableQueryLog();
//            Event::listen('kernel.handled', function ($request, $response) {
//                if ( $request->has('ddsql') ) {
//                    $queries = DB::getQueryLog();
//                    dd($queries);
//                }
//            });
//        }
        //query log

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
