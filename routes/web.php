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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//--- FrontEnd Routes ---//
Route::get('/', 'PagesController@index')->name('main');
Route::get('contact', 'PagesController@contact')->name('contact');
Route::get('cart', 'PagesController@cart')->name('cart');
Route::get('product_category/{id}', 'PagesController@category')->name('product_category');
Route::get('item/{id}', 'PagesController@item')->name('item');
Route::get('checkout', 'PagesController@checkout')->name('checkout');
Route::post('/add', 'PagesController@add')->name('add');
Route::post('/clear', 'PagesController@clear')->name('clear');
Route::get('online-store', 'PagesController@onlineStore')->name('online-store');
Route::get('services', 'PagesController@services')->name('services');
Route::get('checkout_complete', 'PagesController@checkoutComplete')->name('checkout_complete');
Route::get('checkout_complete', 'PagesController@checkoutComplete')->name('checkout_complete');
Route::post('order', 'PagesController@order')->name('order');

//--- BackEnd Routes ---//
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::get('categories/datatable', 'CategoryController@datatable')->name('categories/datatable');
Route::delete('category/delete_category/{id}', 'CategoryController@deleteCategory')->name('category/delete_category');

Route::resource('product', 'ProductController');
Route::get('products/datatable', 'ProductController@datatable')->name('products/datatable');

Route::resource('sale', 'SalesController');
Route::get('sales/datatable', 'SalesController@datatable')->name('sales/datatable');
