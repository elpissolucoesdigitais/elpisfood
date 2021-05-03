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

use App\Models\Client;

Route::get('teste', function()
{
   $client=Client::first();
   $token = $client->createToken('token-teste');
   dd($token->plainTextToken);
});
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){

    /**
     * roles X users
     *
     */
    Route::get('users/{id}/roles/{idRole}/detach','ACL\RoleUserController@detachRoleUser')->name('users.roles.detach');
    Route::post('users/{id}/roles','ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
    Route::any('users/{id}/roles/create','ACL\RoleUserController@RolesAvailable')->name('roles.users.available');

    Route::get('users/{id}/users','ACL\RoleUserController@users')->name('roles.users');

    /**
     * Permission x Role
     */
    Route::get('roles/{id}/permission/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionRole')->name('roles.permission.detach');
    Route::post('roles/{id}/permissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
    Route::get('permissions/{id}/role', 'ACL\PermissionRoleController@roles')->name('permissions.roles');


    /**
     * Routes Roles
     */
    Route::any('roles/search','ACL\RoleController@search')->name('roles.search');
    Route::resource('roles','ACL\RoleController');

    /**
     * Routes Tenants
     */
    Route::any('tenants/search','TenantController@search')->name('tenants.search');
    Route::resource('tenants','TenantController');

    /**
     * Routes test-acl
     */
    route::get('test-acl', function(){
        dd(auth()->user()->hasPermission('Usuario'));
    });
        /**
     * Routes Tables
     */
    Route::get('tables/qrcode/{identify}','TableController@qrcode')->name('tables.qrcode');
    Route::any('tables/search','TableController@search')->name('tables.search');
    Route::resource('tables','TableController');

    /**
     *  product x Category
     *
     */
    Route::get('products/{id}/category/{idCategory}/detach','CategoryProductController@detachCategoryProduct')->name('products.categories.detach');
    Route::post('products/{id}/categories','CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
    Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
    Route::any('products/{id}/categories/create','CategoryProductController@categoriesAvailable')->name('products.categories.available');

    Route::get('products/{id}/products','CategoryProductController@products')->name('categories.products');

    /**
     * Routes Products
     */
    Route::any('products/search','ProductController@search')->name('products.search');
    Route::resource('products','ProductController');
    /**
     * Routes categories
     */
    Route::any('categories/search','CategoryController@search')->name('categories.search');
    Route::resource('categories','CategoryController');
    /**
     * Routes users
     */
    Route::any('users/search','UserController@search')->name('users.search');
    Route::resource('users','UserController');

    /**
     * plan X profile
     *
     */
        Route::get('plans/{id}/permission/{idprofile}/detach','ACL\PlanProfileController@detachPlanProfile')->name('plans.profile.detach');
        Route::post('plans/{id}/permissions','ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
        Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::any('plans/{id}/permissions/create','ACL\PlanProfileController@ProfilesAvailable')->name('plans.profiles.available');

        Route::get('profiles/{id}/plans','ACL\PlanProfileController@plans')->name('profiles.plans');

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
    Route::get('profiles/{id}/permission/{idPermission}/detach','ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');

    Route::get('profiles/{id}/permissions','ACL\PermissionProfileController@permissions')->name('profiles.permissions');

       /**
     *   profile XPermission
     *
     */
    Route::get('permissions/{id}/profile','ACL\PermissionProfileController@profiles')->name('permissions.profiles');
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
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}','DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}','DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit','DetailPlanController@edit')->name('details.plan.edit');


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

    /**
     * Site
     */

    Route::get('plan/{url}','Site\SiteController@plan')->name('plan.subscription');
    Route::get('/', 'Site\SiteController@index')->name('site.home');


/**
 * Auth Routes
 */
Auth::routes();

