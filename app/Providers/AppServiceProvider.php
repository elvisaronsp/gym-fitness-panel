<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('price', function($expression) {
            return "<?php echo ".$expression." . ' zł'; ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ProductListOrderBySingleton', function ($app) {
            $orderBy = $orderField = $orderType = null;
            $fromRequest = false;

            if (request()->has('orderby')) {
                $fromRequest = true;
                $orderBy = request()->get('orderby');
            } elseif (session()->has('frontOrderBy')) {
                $orderBy = session('frontOrderBy');
            }
            
            if (is_array($orderBy)) {
                $availableOrderFields = array_keys(config('project.orderby.products_list_dropdown.data'));
                $field = Str::lower(head(array_keys($orderBy)));
                $orderField = in_array($field, $availableOrderFields) ? $field : null;
                $type = Str::lower(head($orderBy));
                $orderType = str_is('asc', $type) || str_is('desc', $type) ? $type : 'asc';
            }
            
            return compact('fromRequest', 'orderBy', 'orderField', 'orderType');
        });
    }
}
