<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for Authentication
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web','acl'], 'namespace' => 'Modules\Authentication\Http\Controllers'], function () {

    /* REFERENCE */
    // https://restfulapi.net/resource-naming/
    // https://github.com/axios/axios
    // Note the API prefix on the route names!
    // Route::get('foo/index',           ['uses' => 'FooController@list',   'as' => 'API_fooList']);
    // Route::post('foo/create',          ['uses' => 'FooController@create', 'as' => 'API_fooCreate']);
    // Route::get('foo/view/{id}',      ['uses' => 'FooController@view',   'as' => 'API_fooView']);
    // Route::put('foo/update/{id}',      ['uses' => 'FooController@update', 'as' => 'API_fooUpdate']);
    // Route::delete('foo/delete',   ['uses' => 'FooController@delete', 'as' => 'API_fooDelete']);

    /* Duplicate it if you want to manage another object, 1 object, 1 controller, 1 route file */

    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */

});


Route::group(['prefix' => 'backoffice', 'middleware' => ['web'], 'namespace' => 'Modules\Authentication\Http\Controllers'], function () {

    // // Note the empty prefix on the route names! use this route group to serve view files
     Route::post('/login', ['uses' => 'AuthenticationController@login',   'as' => 'backOfficelogin']);
     Route::get('/logout',  ['uses' => 'AuthenticationController@logout', 'as' => 'backOfficelogout']);
    // Route::get('view/{id}',      ['uses' => 'FooController@view',   'as' => '_fooView']);
    // Route::put('update/{id}',      ['uses' => 'FooController@update', 'as' => '_fooUpdate']);
    // Route::delete('delete',   ['uses' => 'FooController@delete', 'as' => '_fooDelete']);

});