<?php

Route::group([
    'prefix'=>'v1',
    'namespace'=>'Api'
],function () {
Route::get('tenants/{uuid}','TenantApiController@show');
Route::get('tenants','TenantApiController@index');

Route::get('categories/','CategoryApiController@categoriesByTenant');
Route::get('categories/{url}','CategoryApiController@show');

Route::get('tables/','TableApiController@tablesByTenant');
Route::get('tables/{identify}','TableApiController@show');

Route::get('products/{identify}','ProductApiController@show');
Route::get('products/','ProductApiController@productsByTenant');
});
