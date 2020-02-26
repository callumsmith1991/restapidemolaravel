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

use App\Jobs\ApiCall;

// Route::get('/', function () {
    
//     return view('home');

//     // dispatch(new ApiCall);

// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'FormController@index');


