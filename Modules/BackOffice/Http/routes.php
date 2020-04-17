<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for BackOffice
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web','acl'], 'namespace' => 'Modules\BackOffice\Http\Controllers'], function () {

    Route::get('foo/index',           ['uses' => 'FooController@list',   'as' => 'API_fooList']);
    Route::post('foo/create',          ['uses' => 'FooController@create', 'as' => 'API_fooCreate']);
    Route::get('foo/view/{id}',      ['uses' => 'FooController@view',   'as' => 'API_fooView']);
    Route::put('foo/update/{id}',      ['uses' => 'FooController@update', 'as' => 'API_fooUpdate']);
    Route::delete('foo/delete',   ['uses' => 'FooController@delete', 'as' => 'API_fooDelete']);

    /* Duplicate it if you want to manage another object, 1 object, 1 controller, 1 route file */

    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */

});



Route::group(['prefix' => 'backoffice', 'middleware' => ['web'], 'namespace' => 'Modules\BackOffice\Http\Controllers'], function () {

    //
    Route::get('/', ['uses' => 'BackOfficeController@index', 'as' => 'backofficeIndex']);
    Route::get('dashboard', ['uses' => 'BackOfficeController@dashboard', 'as' => 'backofficeDashboard', 'middleware' => 'auth']);

    Route::get('partners',  ['uses' => 'PartnerController@index',  'as' => 'partnerIndex' , 'middleware' => ['roles'], 'roles' => ['Developer','Primary Admin','Manager','Staff'] ]);
    Route::get('add-new-partner',  ['uses' => 'PartnerController@addNew',  'as' => 'addNewPartner' , 'middleware' => ['roles'], 'roles' => ['Developer','Primary Admin','Manager','Staff'] ]);

    Route::put('update/{id}',      ['uses' => 'FooController@update', 'as' => '_fooUpdate']);
    Route::delete('delete',   ['uses' => 'FooController@delete', 'as' => '_fooDelete']);

});