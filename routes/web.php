<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('users', 'UserController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function() {
   Route::resource('orders', 'OrderController');
   Route::resource('roles', 'RoleController');
   Route::get('/roles/{role}/permissions/edit', 'RoleController@editPermissions')->name('roles.edit_permissions');
   Route::put('/roles/{role}/permissions/update', 'RoleController@updatePermissions')->name('roles.update_permissions');;
});

