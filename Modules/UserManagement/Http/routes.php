<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for UserManagement
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web'], 'namespace' => 'Modules\UserManagement\Http\Controllers'], function () {

    /* REFERENCE */
    // https://restfulapi.net/resource-naming/
    // https://github.com/axios/axios
    // Note the API prefix on the route names!
    Route::get('foo/index',           ['uses' => 'FooController@list',   'as' => 'API_fooList']);
    Route::post('user/create',          ['uses' => 'UserManagementApiController@create', 'as' => 'API_userCreate']);
    Route::get('foo/view/{id}',      ['uses' => 'FooController@view',   'as' => 'API_fooView']);
    Route::put('foo/update/{id}',      ['uses' => 'FooController@update', 'as' => 'API_fooUpdate']);
    Route::delete('foo/delete',   ['uses' => 'FooController@delete', 'as' => 'API_fooDelete']);

    /* Duplicate it if you want to manage another object, 1 object, 1 controller, 1 route file */

    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */

});


Route::group(['prefix' => 'backoffice/usermanagement', 'middleware' => ['web'], 'namespace' => 'Modules\UserManagement\Http\Controllers'], function () {

    // Note the empty prefix on the route names! use this route group to serve view files
    Route::get('index',           ['uses' => 'UserManagementController@index',   'as' => 'usermanagementIndex']);
    Route::get('createuser',          ['uses' => 'UserManagementController@addUser', 'as' => 'addUser']);
    // Route::get('view/{id}',      ['uses' => 'FooController@view',   'as' => '_fooView']);
    // Route::put('update/{id}',      ['uses' => 'FooController@update', 'as' => '_fooUpdate']);
    // Route::delete('delete',   ['uses' => 'FooController@delete', 'as' => '_fooDelete']);

});