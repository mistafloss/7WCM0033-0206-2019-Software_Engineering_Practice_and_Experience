<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for Website
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web'], 'namespace' => 'Modules\Website\Http\Controllers'], function () {

  
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

    Route::get('/news',  ['uses' => 'WebsiteController@getAllArticles', 'as' => 'getAllArticles']);
    Route::get('/news/{slug}',  ['uses' => 'WebsiteController@getArticleBySlug', 'as' => 'getArticleBySlug']);
    Route::get('/fees', ['uses' => 'WebsiteController@fees', 'as' => 'fees']);
    Route::get('/services', ['uses' => 'WebsiteController@services', 'as' => 'services']);
    Route::get('/landlord-sellers', ['uses' => 'WebsiteController@landlordSellers', 'as' => 'landlordSellers']);
});