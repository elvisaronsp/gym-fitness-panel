<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
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
        $this->app->bind('App\Repositories\Customer\CustomerRepository', 'App\Repositories\Customer\CustomerRepositoryEloquent');
        $this->app->bind('App\Repositories\CustomerVoucher\CustomerVoucherRepository', 'App\Repositories\CustomerVoucher\CustomerVoucherRepositoryEloquent');
        $this->app->bind('App\Repositories\CustomerVisit\CustomerVisitRepository', 'App\Repositories\CustomerVisit\CustomerVisitRepositoryEloquent');
        $this->app->bind('App\Repositories\CustomerSingleEntry\CustomerSingleEntryRepository', 'App\Repositories\CustomerSingleEntry\CustomerSingleEntryRepositoryEloquent');
    }
}
