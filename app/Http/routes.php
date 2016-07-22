<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'mainpage']);
    Route::get('/sandbox', 'SandboxController@index');
    
    Route::group(['namespace' => 'Panel', 'middleware' => 'auth'], function() {
        Route::get('/start',  ['uses' => 'DashboardController@index', 'as' => 'panel.dashboard.index']);

        Route::group(['prefix' => 'customer'], function() {
            Route::get('/', ['uses' => 'CustomerController@index', 'as' => 'panel.customer.index']);
            Route::get('/create', ['uses' => 'CustomerController@create', 'as' => 'panel.customer.create']);
            Route::post('/store', ['uses' => 'CustomerController@store', 'as' => 'panel.customer.store']);
            Route::get('/edit/{id}', ['uses' => 'CustomerController@edit', 'as' => 'panel.customer.edit']);
            Route::post('/update/{id}', ['uses' => 'CustomerController@update', 'as' => 'panel.customer.update']);
            Route::get('/createRenewVoucher/{id}', ['uses' => 'CustomerController@createRenewVoucher', 'as' => 'panel.customer.createRenewVoucher']);
            Route::post('/storeRenewVoucher', ['uses' => 'CustomerController@storeRenewVoucher', 'as' => 'panel.customer.storeRenewVoucher']);
            Route::get('/delete/{id}', ['uses' => 'CustomerController@delete', 'as' => 'panel.customer.delete']);
        });
        
        Route::group(['prefix' => 'voucher'], function() {
            Route::get('/edit/{customrId}', ['uses' => 'VoucherController@edit', 'as' => 'panel.customer.editVoucher']);
            Route::post('/update', ['uses' => 'VoucherController@update', 'as' => 'panel.customer.updateVoucher']);
            Route::get('/editExpiredAt/{id}', ['uses' => 'VoucherController@editExpiredAt', 'as' => 'panel.customer.editVoucherExpiredAt']);
            Route::post('/updateExpiredAt', ['uses' => 'VoucherController@updateExpiredAt', 'as' => 'panel.customer.updateVoucherExpiredAt']);
            Route::get('/updatePayedAt/{id}', ['uses' => 'VoucherController@updatePayedAt', 'as' => 'panel.customer.updateVoucherPayedAt']);
        });
        
        Route::group(['prefix' => 'visit'], function() {
            Route::get('/', ['uses' => 'CustomerVisitController@index', 'as' => 'panel.customerVisit.index']);
            Route::any('/store', ['uses' => 'CustomerVisitController@store', 'as' => 'panel.customerVisit.store']);
            Route::any('/cancel', ['uses' => 'CustomerVisitController@cancel', 'as' => 'panel.customerVisit.cancel']);
        });
        
        Route::group(['prefix' => 'singleEntry'], function() {
            Route::get('/', ['uses' => 'CustomerSingleEntryController@index', 'as' => 'panel.customerSingleEntry.index']);
            Route::any('/store', ['uses' => 'CustomerSingleEntryController@store', 'as' => 'panel.customerSingleEntry.store']);
        });
        
        Route::group(['prefix' => 'report'], function() {
            Route::get('/', ['uses' => 'ReportController@index', 'as' => 'panel.report.index']);
            Route::any('generate', ['uses' => 'ReportController@generateReport', 'as' => 'panel.report.generate']);
        });
        
        Route::group(['prefix' => 'product'], function() {
            Route::get('/', ['uses' => 'ProductController@index', 'as' => 'panel.product.index']);
            Route::get('/create', ['uses' => 'ProductController@create', 'as' => 'panel.product.create']);
            Route::post('/store', ['uses' => 'ProductController@store', 'as' => 'panel.product.store']);
            Route::get('/edit/{id}', ['uses' => 'ProductController@edit', 'as' => 'panel.product.edit']);
            Route::post('/update/{id}', ['uses' => 'ProductController@update', 'as' => 'panel.product.update']);
            Route::get('/delete/{id}', ['uses' => 'ProductController@delete', 'as' => 'panel.product.delete']);
        });
        
        Route::group(['prefix' => 'productWarehouse'], function() {
            Route::get('/sell/{id}/{quantity?}', ['uses' => 'ProductWarehouseController@sell', 'as' => 'panel.productWarehouse.sell']);
            Route::get('/correct/{id}/', ['uses' => 'ProductWarehouseController@getCorrect', 'as' => 'panel.productWarehouse.correct']);
            Route::post('/storeCorrect', ['uses' => 'ProductWarehouseController@storeCorrect', 'as' => 'panel.productWarehouse.storeCorrect']);
            Route::get('/adoption/{id}/', ['uses' => 'ProductWarehouseController@getAdoption', 'as' => 'panel.productWarehouse.adoption']);
            Route::post('/storeAdoption', ['uses' => 'ProductWarehouseController@storeAdoption', 'as' => 'panel.productWarehouse.storeAdoption']);
        });
    });
});
