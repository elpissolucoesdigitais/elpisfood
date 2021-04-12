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

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function(){
    /**
     * create Permission
     *
     */
    Route::post('profiles/{id}/permissions','ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');

    Route::any('profiles/{id}/permissions/create','ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');

        /**
     * Permission X profile
     *
     */
    Route::get('profiles/{id}/permissions','ACL\PermissionProfileController@permissions')->name('profiles.permissions');


    /**
     * Routes Permission
     */
    Route::any('permissions/search','ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions','ACL\PermissionController');

    /**
     * Routes Profiles
     */
        Route::any('profiles/search','ACL\ProfileController@search')->name('profiles.search');
        Route::resource('profiles','ACL\ProfileController');



    /**
     * Routes Detail Plans
     */
    Route::delete('plans/{url}/details/{idDetail}','DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}','DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}','DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit','DetailPlanController@edit')->name('details.plan.edit');
    Route::get('plans/{url}/details/create','DetailPlanController@create')->name('details.plan.create');
    Route::post('plans/{url}/details','DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details','DetailPlanController@index')->name('details.plan.index');





    /**
     * Routes dashboard
     */

    Route::get('/','PlanController@index')->name('admin.index');
    /**
     * Routes Plans
     */

    Route::get('plans/{url}/edit','PlanController@edit')->name('plans.edit');
    Route::put('admin/plans/{url}','PlanController@update')->name('plans.update');

    Route::any('plans/search','PlanController@search')->name('plans.search');
    Route::post('plans','PlanController@store')->name('plans.store');
    Route::get('plans','PlanController@index')->name('plans.index');
    Route::get('plans/create','PlanController@create')->name('plans.create');
    Route::get('plans/{url}','PlanController@show')->name('plans.show');
    Route::delete('plans/{url}','PlanController@destroy')->name('plans.destroy');
});



Route::get('/', function () {
    return view('welcome');
});


