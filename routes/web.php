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

Auth::routes();

Route::get('/', 'TestController@popular');

Route::prefix('tests')->group(function () {
//    Route::middleware('auth')->group(function () {
//        Route::match(['get','post'],'add', 'TestController@add')->name('addTest');
//        Route::post('{id}/delete','TestController@delete')
//            ->middleware('test.author');
//    });
//
    Route::get('/{id}/questions', 'QuestionController@index')->name('testQuestions');
});

Route::post('like', 'TestController@like')->middleware('auth')
    ->name('like');
Route::get('home', 'HomeController@index')->name('home');


/*Route::prefix('login')->namespace('Auth')->group(function () {
    Route::get('{provider}', 'SocialController@oauthRedirect')
         ->name('auth.social');
    Route::get('{provider}/callback', 'SocialController@login')
         ->name('auth.social.callback');
});*/

