<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for Property
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web','roles'], 'roles' => ['Developer','Primary Admin','Manager','Staff'], 'namespace' => 'Modules\Property\Http\Controllers'], function () {

    Route::post('create/property-category',   ['uses' => 'PropertyApiController@createPropertyCategory', 'as' => 'API_createPropertyCategory']);
    Route::post('property-category/update',      ['uses' => 'PropertyApiController@updatePropertyCategory', 'as' => 'API_editPropertyCategory']);
    Route::get('property-category/show/{id}',      ['uses' => 'PropertyApiController@viewPropertyCategory',   'as' => 'API_viewPropertyCategory']);
   
    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */

});


Route::group(['prefix' => 'backoffice/property', 'middleware' => ['web','roles'],'roles' => ['Developer','Primary Admin','Manager','Staff'], 'namespace' => 'Modules\Property\Http\Controllers'], function () {

    // Note the empty prefix on the route names! use this route group to serve view files
     Route::get('types',           ['uses' => 'PropertyController@categoryIndex',   'as' => 'propertyCategoryIndex']);
     Route::get('listings',          ['uses' => 'PropertyController@propertyIndex', 'as' => 'propertyIndex']);
    // Route::get('view/{id}',      ['uses' => 'FooController@view',   'as' => '_fooView']);
    // Route::put('update/{id}',      ['uses' => 'FooController@update', 'as' => '_fooUpdate']);
    // Route::delete('delete',   ['uses' => 'FooController@delete', 'as' => '_fooDelete']);

});