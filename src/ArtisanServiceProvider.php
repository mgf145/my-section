<?php

namespace Mgh\Section;

use Illuminate\Foundation\Providers\ArtisanServiceProvider as LaravelArtisanServiceProvider;
use Mgh\Section\Console\InstallCommand;
use Mgh\Section\Console\SectionAdd;
use Mgh\Section\Console\SectionChannel;
use Mgh\Section\Console\SectionCommand;
use Mgh\Section\Console\SectionController;
use Mgh\Section\Console\SectionEvent;
use Mgh\Section\Console\SectionException;
use Mgh\Section\Console\SectionFactory;
use Mgh\Section\Console\SectionJob;
use Mgh\Section\Console\SectionListener;
use Mgh\Section\Console\SectionMail;
use Mgh\Section\Console\SectionMiddleware;
use Mgh\Section\Console\SectionMigration;
use Mgh\Section\Console\SectionModel;
use Mgh\Section\Console\SectionNotification;
use Mgh\Section\Console\SectionObserver;
use Mgh\Section\Console\SectionPolicy;
use Mgh\Section\Console\SectionRequest;
use Mgh\Section\Console\SectionResource;
use Mgh\Section\Console\SectionRule;
use Mgh\Section\Console\SectionSeed;
use Mgh\Section\Console\SectionTest;
use Mgh\Section\Console\SectionView;

class ArtisanServiceProvider extends LaravelArtisanServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
                            SectionAdd::class,
                            SectionView::class,
                            InstallCommand::class,
                        ]);
    }

    protected function registerResourceMakeCommand()
    {
        $this->app->singleton('command.resource.make', function ($app) {
            return new SectionResource($app['files']);
        });
    }

    protected function registerMailMakeCommand()
    {
        $this->app->singleton('command.mail.make', function ($app) {
            return new SectionMail($app['files']);
        });
    }

    protected function registerNotificationMakeCommand()
    {
        $this->app->singleton('command.notification.make', function ($app) {
            return new SectionNotification($app['files']);
        });
    }

    protected function registerRequestMakeCommand()
    {
        $this->app->singleton('command.request.make', function ($app) {
            return new SectionRequest($app['files']);
        });
    }

    protected function registerJobMakeCommand()
    {
        $this->app->singleton('command.job.make', function ($app) {
            return new SectionJob($app['files']);
        });
    }

    protected function registerPolicyMakeCommand()
    {
        $this->app->singleton('command.policy.make', function ($app) {
            return new SectionPolicy($app['files']);
        });
    }

    protected function registerFactoryMakeCommand()
    {
        $this->app->singleton('command.factory.make', function ($app) {
            return new SectionFactory($app['files']);
        });
    }

    protected function registerEventMakeCommand()
    {
        $this->app->singleton('command.event.make', function ($app) {
            return new SectionEvent($app['files']);
        });
    }

    protected function registerListenerMakeCommand()
    {
        $this->app->singleton('command.listener.make', function ($app) {
            return new SectionListener($app['files']);
        });
    }

    protected function registerSeederMakeCommand()
    {
        $this->app->singleton('command.seeder.make', function ($app) {
            return new SectionSeed($app['files'], $app['composer']);
        });
    }

    protected function registerMigrateMakeCommand()
    {
        $this->app->singleton('command.migrate.make', function ($app) {
            $creator = $app['migration.creator'];
            $composer = $app['composer'];

            return new SectionMigration($creator, $composer);
        });
    }

    protected function registerModelMakeCommand()
    {
        $this->app->singleton('command.model.make', function ($app) {
            return new SectionModel($app['files']);
        });
    }

    protected function registerTestMakeCommand()
    {
        $this->app->singleton('command.test.make', function ($app) {
            return new SectionTest($app['files']);
        });
    }

    protected function registerRuleMakeCommand()
    {
        $this->app->singleton('command.rule.make', function ($app) {
            return new SectionRule($app['files']);
        });
    }

    protected function registerControllerMakeCommand()
    {
        $this->app->singleton('command.controller.make', function ($app) {
            return new SectionController($app['files']);
        });
    }

    protected function registerChannelMakeCommand()
    {
        $this->app->singleton('command.channel.make', function ($app) {
            return new SectionChannel($app['files']);
        });
    }

    protected function registerConsoleMakeCommand()
    {
        $this->app->singleton('command.console.make', function ($app) {
            return new SectionCommand($app['files']);
        });
    }

    protected function registerExceptionMakeCommand()
    {
        $this->app->singleton('command.exception.make', function ($app) {
            return new SectionException($app['files']);
        });
    }

    protected function registerMiddlewareMakeCommand()
    {
        $this->app->singleton('command.middleware.make', function ($app) {
            return new SectionMiddleware($app['files']);
        });
    }

    protected function registerObserverMakeCommand()
    {
        $this->app->singleton('command.observer.make', function ($app) {
            return new SectionObserver($app['files']);
        });
    }
}
