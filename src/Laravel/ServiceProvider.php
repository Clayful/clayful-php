<?php

namespace Clayful\Laravel;

use Illuminate\Support\BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('clayful.php'),
        ], 'clayful-config');
    }
    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            config_path('clayful.php'),
            'clayful'
        );
    }
}