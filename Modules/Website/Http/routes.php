<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for Website
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web'], 'namespace' => 'Modules\Website\Http\Controllers'], function () {

    /* REFERENCE */
    // https://restfulapi.net/resource-naming/
    // https://github.com/axios/axios
    // Note the API prefix on the route names!


    /* Duplicate it if you want to manage another object, 1 object, 1 controller, 1 route file */

    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */

});


Route::group(['prefix' => '', 'middleware' => ['web'], 'namespace' => 'Modules\Website\Http\Controllers'], function () {

    Route::get('/',   ['uses' => 'WebsiteController@index',   'as' => 'websiteIndex']);
    Route::get('/property-search',  ['uses' => 'WebsiteController@search', 'as' => 'propertySearch']);
   

});