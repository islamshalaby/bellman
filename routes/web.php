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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'AdminControllers', 'prefix' => 'admin-panel', 'middleware' => ['admin', 'lang']], function () {
    Route::get('/', function () {
        $title = "Dashboard";
       return view('admin.index', compact('title'));
    });
    Route::resource('companies', 'Companies');
    Route::resource('employees', 'Employees');
    Route::get('/lang/{lang}', 'SetLang@index');
});


