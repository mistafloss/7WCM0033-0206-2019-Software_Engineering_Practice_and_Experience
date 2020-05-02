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
    Route::get('/property-search',  ['uses' => 'WebsiteController@searchProperty', 'as' => 'searchProperty']);
    Route::get('/property',  ['uses' => 'WebsiteController@allProperties', 'as' => 'allProperties']);
    Route::get('/property/{id}',  ['uses' => 'WebsiteController@propertyDetails', 'as' => 'propertyDetails']);
    Route::get('/property/{status}/{id}/book-viewing',  ['uses' => 'WebsiteController@bookViewing', 'as' => 'bookViewing']);
    Route::get('/property/{status}/{id}/request-details',  ['uses' => 'WebsiteController@requestPropertyInformation', 'as' => 'requestPropertyInformation']);
    Route::post('/book-appointment', ['uses' => 'WebsiteController@bookPropertyAppointment', 'as' => 'bookPropertyAppointment']);
    Route::post('/request-information', ['uses' => 'WebsiteController@postRequestPropertyInformation', 'as' => 'postRequestPropertyInformation']);
    Route::get('/book-valuation', ['uses' => 'WebsiteController@getPropertyEvaluation', 'as' => 'getPropertyEvaluation']);
    Route::post('/book-valuation-appointment', ['uses' => 'WebsiteController@postPropertyEvaluation', 'as' => 'postPropertyEvaluation']);
});