<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
//  переводим дату на русский
        Carbon::setLocale('ru_RU');

//  создаём пагинацию
//        Paginator::useBootstrap();
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
