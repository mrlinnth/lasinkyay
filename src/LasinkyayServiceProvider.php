<?php

namespace Mrlinnth\Lasinkyay;

use Illuminate\Support\ServiceProvider;
use Mrlinnth\Lasinkyay\Contracts\PlanFeatureInterface;
use Mrlinnth\Lasinkyay\Contracts\PlanInterface;
use Mrlinnth\Lasinkyay\Contracts\PlanSubscriptionInterface;
use Mrlinnth\Lasinkyay\Contracts\PlanSubscriptionUsageInterface;
use Mrlinnth\Lasinkyay\Contracts\SubscriptionBuilderInterface;
use Mrlinnth\Lasinkyay\Contracts\SubscriptionResolverInterface;
use Mrlinnth\Lasinkyay\SubscriptionBuilder;
use Mrlinnth\Lasinkyay\SubscriptionResolver;

class LasinkyayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $publishablePath = dirname(__DIR__) . '/publishable';

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/api.php');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/web.php');

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'lasinkyay');

        $this->loadTranslationsFrom($publishablePath . '/lang', 'lasinkyay');

        if ($this->app->runningInConsole()) {

            $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations');

            $this->publishes([
                $publishablePath . '/lang' => resource_path('lang/vendor/lasinkyay'),
            ]);

            $this->publishes([
                $publishablePath . '/config/lasinkyay.php' => config_path('lasinkyay.php'),
            ], 'lasinkyay');

            $this->publishes([
                dirname(__DIR__) . '/resources/views' => resource_path('views/vendor/lasinkyay'),
            ], 'lasinkyay');

            $this->publishes([
                dirname(__DIR__) . '/resources/assets/js/components' => resource_path('js/components/lasinkyay'),
            ], 'lasinkyay');

        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/publishable/config/lasinkyay.php', 'lasinkyay');

        $this->app->bind(PlanInterface::class, config('lasinkyay.models.plan'));
        $this->app->bind(PlanFeatureInterface::class, config('lasinkyay.models.plan_feature'));
        $this->app->bind(PlanSubscriptionInterface::class, config('lasinkyay.models.plan_subscription'));
        $this->app->bind(PlanSubscriptionUsageInterface::class, config('lasinkyay.models.plan_subscription_usage'));
        $this->app->bind(SubscriptionBuilderInterface::class, SubscriptionBuilder::class);
        $this->app->bind(SubscriptionResolverInterface::class, SubscriptionResolver::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //
    }

}
