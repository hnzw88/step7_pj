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

//一覧表示
Route::get('/products', 'App\Http\Controllers\ProductController@index')-> name('product.index');

//新規登録
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')-> name('product.create');
Route::post('/products/store/', 'App\Http\Controllers\ProductController@store')-> name('product.store');

//詳細表示
Route::get('/products/show/{product}', 'App\Http\Controllers\ProductController@show')-> name('product.show');

//編集
Route::get('/products/edit/{product}', 'App\Http\Controllers\ProductController@edit')-> name('product.edit');
Route::put('/products/edit/{product}', 'App\Http\Controllers\ProductController@update')-> name('product.update');

//削除
Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy')-> name('product.destroy');