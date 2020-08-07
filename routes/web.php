<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

/*Route::prefix('login')->namespace('Auth')->group(function () {
    Route::get('{provider}', 'SocialController@oauthRedirect')
         ->name('auth.social');
    Route::get('{provider}/callback', 'SocialController@login')
         ->name('auth.social.callback');
});*/

Route::get('home', 'HomeController@index')->name('home');
