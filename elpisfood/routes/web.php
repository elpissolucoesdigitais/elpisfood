<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('admin','Admin\PlanController@index')->name('admin.index');
Route::put('admin/plans/{url}/edit','Admin\PlanController@edit')->name('plans.edit');
Route::put('admin/plans/{url}','Admin\PlanController@update')->name('plans.update');

Route::any('admin/plans/search','Admin\PlanController@search')->name('plans.search');
Route::post('admin/plans','Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans','Admin\PlanController@index')->name('plans.index');
Route::get('admin/plans/create','Admin\PlanController@create')->name('plans.create');
Route::get('admin/plans/{url}','Admin\PlanController@show')->name('plans.show');
Route::delete('admin/plans/{url}','Admin\PlanController@destroy')->name('plans.destroy');





Route::get('/', function () {
    return view('welcome');
});


