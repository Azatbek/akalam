<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(
            'home',
            'App\Http\Composers\HomeComposer'
        );
    }
  }
 ?>
