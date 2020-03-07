<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for UserManagement
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web'], 'namespace' => 'Modules\UserManagement\Http\Controllers'], function () {
    
    Route::get('foo/index',           ['uses' => 'FooController@list',   'as' => 'API_fooList']);
    Route::post('user/create',          ['uses' => 'UserManagementApiController@create', 'as' => 'API_userCreate']);
    Route::post('role/update',          ['uses' => 'RoleApiController@update', 'as' => 'API_roleUpdate']);

    Route::get('foo/view/{id}',      ['uses' => 'FooController@view',   'as' => 'API_fooView']);
    Route::put('foo/update/{id}',      ['uses' => 'FooController@update', 'as' => 'API_fooUpdate']);
    Route::delete('foo/delete',   ['uses' => 'FooController@delete', 'as' => 'API_fooDelete']);

    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */

});


Route::group(['prefix' => 'backoffice/usermanagement', 'middleware' => ['web','roles'],'roles' => ['Developer','Primary Admin','Manager','Staff'], 'namespace' => 'Modules\UserManagement\Http\Controllers'], function () {

    // Route::group(['middleware' => 'roles:Manager, permission:can_cancel_property_sale'], function(){
      
    // });
    Route::get('index', ['uses' => 'UserManagementController@index',   'as' => 'usermanagementIndex']);
    Route::get('roles', ['uses' => 'UserManagementController@rolesIndex',   'as' => 'rolesIndex']);
    Route::get('role/view/{id}', ['uses' => 'RoleController@view', 'as' => 'viewRole']);
    Route::get('permissions', ['uses' => 'UserManagementController@permissionsIndex',   'as' => 'permissionsIndex']);
    
    Route::get('createuser',  ['uses' => 'UserManagementController@addUser', 'as' => 'addUser']);
    // Route::get('view/{id}',      ['uses' => 'FooController@view',   'as' => '_fooView']);
    // Route::put('update/{id}',      ['uses' => 'FooController@update', 'as' => '_fooUpdate']);
    // Route::delete('delete',   ['uses' => 'FooController@delete', 'as' => '_fooDelete']);

});