<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for Property
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web','roles'], 'roles' => ['Developer','Primary Admin','Manager','Staff'], 'namespace' => 'Modules\Property\Http\Controllers'], function () {

    Route::post('create/property-category',   ['uses' => 'PropertyApiController@createPropertyCategory', 'as' => 'API_createPropertyCategory']);
    Route::post('property-category/update',      ['uses' => 'PropertyApiController@updatePropertyCategory', 'as' => 'API_editPropertyCategory']);
    Route::post('property/update',      ['uses' => 'PropertyApiController@updateProperty', 'as' => 'API_editProperty']);
    Route::get('property-category/show/{id}',      ['uses' => 'PropertyApiController@viewPropertyCategory',   'as' => 'API_viewPropertyCategory']);
    Route::post('create/property',   ['uses' => 'PropertyApiController@createProperty', 'as' => 'API_createProperty']);
    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */

});


Route::group(['prefix' => 'backoffice/property', 'middleware' => ['web','roles'],'roles' => ['Developer','Primary Admin','Manager','Staff'], 'namespace' => 'Modules\Property\Http\Controllers'], function () {

    // Note the empty prefix on the route names! use this route group to serve view files
     Route::get('types',     ['uses' => 'PropertyController@categoryIndex',   'as' => 'propertyCategoryIndex']);
     Route::get('listings',  ['uses' => 'PropertyController@propertyIndex', 'as' => 'propertyIndex']);
     Route::get('add-new',   ['uses' => 'PropertyController@addNewProperty',   'as' => 'addNewProperty']);
     Route::get('show/{id}', ['uses' => 'PropertyController@showProperty',   'as' => 'showProperty']);
     Route::post('update',  ['uses' => 'PropertyController@updateProperty', 'as' => 'updateProperty']);
     Route::post('delete-image', ['uses' => 'PropertyController@deleteImage', 'as' => 'deleteImage']);
     Route::get('tenancies',   ['uses' => 'PropertyController@getTenancies',   'as' => 'getTenancies']);
     Route::get('add-tenancy',   ['uses' => 'PropertyController@addNewTenancy',   'as' => 'addNewTenancy']);
    // Route::delete('delete',   ['uses' => 'FooController@delete', 'as' => '_fooDelete']);

});