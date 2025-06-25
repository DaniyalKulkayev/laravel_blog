<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController@index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController@index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController@index')->name('admin.category.index');
        Route::get('/create', 'IndexController@create')->name('admin.category.create');
        Route::post('/', 'IndexController@store')->name('admin.category.store');
        Route::get('/{category}', 'IndexController@show')->name('admin.category.show');
        Route::get('/{category}/edit', 'IndexController@edit')->name('admin.category.edit');
        Route::patch('/{category}', 'IndexController@update')->name('admin.category.update');
    });
});



Auth::routes();
