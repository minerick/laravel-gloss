<?php namespace Ilkermutlu\Gloss;

use Illuminate\Support\ServiceProvider;

class GlossServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('gloss', function() {
            return new \Ilkermutlu\Gloss\Gloss;
        });
    }
}
