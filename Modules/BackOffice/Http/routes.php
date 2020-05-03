<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for BackOffice
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web','acl'], 'namespace' => 'Modules\BackOffice\Http\Controllers'], function () {

  

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

    Route::group(['middleware' => ['roles'] ,'roles' => ['Developer','Primary Admin','Manager','Staff']] , function(){
        Route::get('partners',  ['uses' => 'PartnerController@index',  'as' => 'partnerIndex' ]);
        Route::get('add-new-partner',  ['uses' => 'PartnerController@addNew',  'as' => 'addNewPartner']);
        Route::post('createpartner',   ['uses' => 'PartnerController@createPartner', 'as' => 'createPartner']);
        Route::get('partner/show/{id}', ['uses' => 'PartnerController@showPartner',   'as' => 'showPartner']);
        Route::post('updatepartner', ['uses' => 'PartnerController@updatePartner', 'as' => 'updatePartner']);
        Route::get('news',  ['uses' => 'NewsController@index',  'as' => 'newsIndex' ]);
        Route::get('news/add-new',  ['uses' => 'NewsController@newArticle',  'as' => 'newArticle' ]);
        Route::get('news/update/{id}',  ['uses' => 'NewsController@updateArticle',  'as' => 'updateArticle' ]);
        Route::post('updatearticle',  ['uses' => 'NewsController@postUpdateArticle',  'as' => 'postUpdateArticle']);
        Route::post('createarticle',   ['uses' => 'NewsController@postNewArticle', 'as' => 'postNewArticle']);
        Route::get('content/fees', ['uses' => 'ContentController@fees', 'as' => 'feesContent']);
        Route::post('updatefeescontent',   ['uses' => 'ContentController@postFeesContent', 'as' => 'postFeesContent']);
        Route::get('content/services', ['uses' => 'ContentController@services', 'as' => 'servicesContent']);
        Route::post('updateservicescontent',   ['uses' => 'ContentController@postServicesContent', 'as' => 'postServicesContent']);
    });
   
});