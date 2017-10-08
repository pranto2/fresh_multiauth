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

Route::get('/', function () { return view('welcome'); });

Route::prefix('stuff')->group(function () {
    Route::get('/', 'StuffController@login')->name('stuff');
    Route::post('/login', 'StuffController@postlogin')->name('stufflogin');
    Route::get('/dashboard', 'StuffController@dashboard')->name('dashboard');
    Route::get('/edit/{id}', 'StuffController@edit')->name('stuffedit');
    Route::post('/update', 'StuffController@passwordchange')->name('updatepassword');
    Route::get('/logout', 'StuffController@logout')->name('stufflogout');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/','AdminController@login')->name('admin');
    Route::post('/login','AdminController@postlogin')->name('adminlogin');
    Route::get('/dashboard','AdminController@dashboard')->name('admindashboard');
    Route::get('/logout','AdminController@logout')->name('adminlogout');
});

