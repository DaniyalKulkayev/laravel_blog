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
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController@index')->name('admin.post.index');
        Route::get('/create', 'IndexController@create')->name('admin.post.create');
        Route::post('/', 'IndexController@store')->name('admin.post.store');
        Route::get('/{post}', 'IndexController@show')->name('admin.post.show');
        Route::get('/{post}/edit', 'IndexController@edit')->name('admin.post.edit');
        Route::patch('/{post}', 'IndexController@update')->name('admin.post.update');
        Route::delete('/{post}', 'IndexController@destroy')->name('admin.post.delete');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController@index')->name('admin.category.index');
        Route::get('/create', 'IndexController@create')->name('admin.category.create');
        Route::post('/', 'IndexController@store')->name('admin.category.store');
        Route::get('/{category}', 'IndexController@show')->name('admin.category.show');
        Route::get('/{category}/edit', 'IndexController@edit')->name('admin.category.edit');
        Route::patch('/{category}', 'IndexController@update')->name('admin.category.update');
        Route::delete('/{category}', 'IndexController@destroy')->name('admin.category.delete');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController@index')->name('admin.tag.index');
        Route::get('/create', 'IndexController@create')->name('admin.tag.create');
        Route::post('/', 'IndexController@store')->name('admin.tag.store');
        Route::get('/{tag}', 'IndexController@show')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'IndexController@edit')->name('admin.tag.edit');
        Route::patch('/{tag}', 'IndexController@update')->name('admin.tag.update');
        Route::delete('/{tag}', 'IndexController@destroy')->name('admin.tag.delete');
    });
});



Auth::routes();
