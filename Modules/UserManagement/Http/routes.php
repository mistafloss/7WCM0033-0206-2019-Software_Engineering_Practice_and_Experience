<?php
/*
|--------------------------------------------------------------------------
| EstateAgencyPortal API & BL Routes for UserManagement
|--------------------------------------------------------------------------|
*/


Route::group(['prefix' => 'api', 'middleware' => ['web'], 'namespace' => 'Modules\UserManagement\Http\Controllers'], function () {
    Route::post('user/create',   ['uses' => 'UserManagementApiController@create', 'as' => 'API_userCreate']);
    Route::post('user/update',   ['uses' => 'UserManagementApiController@update', 'as' => 'API_userUpdate']);
    Route::post('role/update',   ['uses' => 'RoleApiController@update', 'as' => 'API_roleUpdate']);

    /*
        For filtering, use Query parameters
        /foo?id=someId&role=someRole
     */
});


Route::group(['prefix' => 'backoffice/usermanagement', 'middleware' => ['web','roles'],'roles' => ['Developer','Primary Admin','Manager','Staff'], 'namespace' => 'Modules\UserManagement\Http\Controllers'], function () {

    Route::get('index', ['uses' => 'UserManagementController@index',   'as' => 'usermanagementIndex']);
    Route::get('roles', ['uses' => 'RoleController@rolesIndex',   'as' => 'rolesIndex']);
    Route::get('role/view/{id}', ['uses' => 'RoleController@view', 'as' => 'viewRole']);
    Route::get('user/view/{id}', ['uses' => 'UserManagementController@view', 'as' => 'viewUser']);
    Route::get('permissions', ['uses' => 'UserManagementController@permissionsIndex',   'as' => 'permissionsIndex']);
    
    Route::get('createuser',  ['uses' => 'UserManagementController@addUser', 'as' => 'addUser']);
    Route::get('view/{id}',      ['uses' => 'UserManagementController@view',   'as' => '_fooView']);
    // Route::put('update/{id}',      ['uses' => 'FooController@update', 'as' => '_fooUpdate']);
    // Route::delete('delete',   ['uses' => 'FooController@delete', 'as' => '_fooDelete']);

});