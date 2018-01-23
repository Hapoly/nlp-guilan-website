<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){
      // View::composer('*', function ($view) {
      //   if ( ! empty($view['title']) )
      //     $view['title'] .= ' - ' . $view['title'];
      //   return $view;
      // });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
