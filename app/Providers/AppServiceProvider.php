<?php

namespace App\Providers;

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
      view()->composer(
        ['widgets.home_news', 'widgets.home_categories','parts.footer'],
        'App\Http\Composers\HomeComposer'
      );
      view()->composer(
        ['parts.sidebar_right'],
        'App\Http\Composers\SidebarComposer'
      );
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
