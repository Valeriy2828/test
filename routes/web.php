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



Route::auth();


//Customers
Route::get('/', 'MainController@index')->name('main');

Route::get('/addCustomer', 'MainController@add')->name('add');
Route::post('/addCustomer/add', 'MainController@store');

Route::get('/delete/{customer_id}', 'MainController@destroy')->name('destroy');

Route::get('/edit/{customer_id}', 'MainController@edit')->name('edit');
Route::post('/edit/{customer_id}/update', 'MainController@update');

//Firms
Route::get('/addFirm', 'MainController@addFirm')->name('addFirm');
Route::post('/addFirm/add', 'MainController@storeFirm');

Route::get('/deleteFirm/{id}', 'MainController@destroyFirm')->name('destroyFirm');

Route::get('/editFirm/{id}', 'MainController@editFirm')->name('editFirm');
Route::post('/editFirm/{id}/update', 'MainController@updateFirm');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
