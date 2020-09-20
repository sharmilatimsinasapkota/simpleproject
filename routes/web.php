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

Route::get('/about', function () {
    return view('about',[
        'articles'=>App\Models\Article::latest()->get()
    ]);
});
Route::get('/articles','App\Http\Controllers\ArticlesController@index');
Route::post('/articles','App\Http\Controllers\ArticlesController@store'); //create new row in database table
Route::get('/articles/create','App\Http\Controllers\ArticlesController@create');//to show up the create form for the user
Route::get('/articles/{article}','App\Http\Controllers\ArticlesController@show');
Route::get('/articles/{article}/edit','App\Http\Controllers\ArticlesController@edit'); // to show up the edit form for the user
Route::put('/articles/{article}','App\Http\Controllers\ArticlesController@update');
