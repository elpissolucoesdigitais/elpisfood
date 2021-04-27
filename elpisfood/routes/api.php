<?php
Route::get('tenants/{uuid}','Api\TenantApiController@show');
Route::get('tenants','Api\TenantApiController@index');

Route::get('categories/','Api\CategoryApiController@categoriesByTenant');
Route::get('categories/{url}','Api\CategoryApiController@show');

Route::get('tables/','Api\TableApiController@tablesByTenant');
Route::get('tables/{identify}','Api\TableApiController@show');

Route::get('products/','Api\ProductApiController@productsByTenant');
