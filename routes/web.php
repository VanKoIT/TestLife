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

Route::get('/', 'TestController@index');
Route::get('dev', function () {
    return view('development');
});

Route::get('home', 'HomeController@index')->name('home');
Route::post('email/exist','CheckController@emailExist');

Route::middleware('auth')->group(function () {
    Route::get('test/{testId}','QuestionController@index')->name('testQuestions');
    Route::get('result/{attemptId}','ResultController@displayAttempt')
        ->middleware('attempt.user');;

    Route::post('auth/check','CheckController@auth');
    Route::post('like/add','LikeController@likeAdd');
    Route::post('like/delete','LikeController@likeDelete');
    Route::post('result','ResultController@saveResults');
});

/*Route::prefix('login')->namespace('Auth')->group(function () {
    Route::get('{provider}', 'SocialController@oauthRedirect')
         ->name('auth.social');
    Route::get('{provider}/callback', 'SocialController@login')
         ->name('auth.social.callback');
});*/

