<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*** Start Dashboard ***/
        //Category
        $this->app->bind(
            'App\Repositories\Dashboard\Category\CategoryInterface',
            'App\Repositories\Dashboard\Category\CategoryRepository',
        );

        //Product
        $this->app->bind(
            'App\Repositories\Dashboard\Product\ProductInterface',
            'App\Repositories\Dashboard\Product\ProductRepository',
        );

        //Country
        $this->app->bind(
            'App\Repositories\Dashboard\Country\CountryInterface',
            'App\Repositories\Dashboard\Country\CountryRepository',
        );

        //City
        $this->app->bind(
            'App\Repositories\Dashboard\City\CityInterface',
            'App\Repositories\Dashboard\City\CityRepository',
        );

        //Area
        $this->app->bind(
            'App\Repositories\Dashboard\Area\AreaInterface',
            'App\Repositories\Dashboard\Area\AreaRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
