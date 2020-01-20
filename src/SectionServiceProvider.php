<?php

namespace Mgh\Section;

use Faker\Generator as FakerGenerator;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;

class SectionServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            // coreui template
            $this->publishes([
                __DIR__.'/../resources/views/coreui' => resource_path('views/admin'),
            ], 'section-coreui-views');
            $this->publishes([
                __DIR__.'/../resources/assets/coreui/dist' => public_path('assets/admin'),
            ], 'section-coreui-assets');
            /*$this->publishes([
                __DIR__.'/../resources/assets/sass'   => resource_path('assets/sass'),
                __DIR__.'/../resources/assets/js'     => resource_path('assets/js'),
                __DIR__.'/../resources/assets/static' => resource_path('assets/static'),
            ], 'section-coreui-asset-sources');*/

            // adminator template
            $this->publishes([
                __DIR__.'/../resources/views/adminator' => resource_path('views/admin'),
            ], 'section-adminator-views');
            $this->publishes([
                __DIR__.'/../resources/assets/adminator/dist' => public_path('assets/admin'),
            ], 'section-adminator-assets');
            $this->publishes([
                __DIR__.'/../resources/assets/adminator/sass'   => resource_path('assets/sass'),
                __DIR__.'/../resources/assets/adminator/js'     => resource_path('assets/js'),
                __DIR__.'/../resources/assets/adminator/static' => resource_path('assets/static'),
            ], 'section-adminator-asset-sources');

            // lang files
            $this->publishes([
                __DIR__.'/../resources/lang/en/admin.php' => resource_path('lang/en/admin.php'),
                __DIR__.'/../resources/lang/fa/admin.php' => resource_path('lang/fa/admin.php'),
            ], 'section-translations');
        }
        $this->factories();
    }

    public function register()
    {
        $this->app->register(ArtisanServiceProvider::class);
        $this->app->register(MigrationServiceProvider::class);
    }

    protected function factories()
    {
        if (in_array($this->app->environment(), ['local', 'testing'])) {
            $this->app->singleton(EloquentFactory::class, function ($app) {
                return EloquentFactory::construct($app->make(FakerGenerator::class), __DIR__.'/database/factories');
            });
        }
    }
}
