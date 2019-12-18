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

use App\Http\Middleware\HelloMiddleware;

// FtaTool作成の記述
Route::get('/', 'FTAToolController@index')->name('ftatool');
Route::post('ftatool', 'FTAToolController@post');
Route::get('errorpage', 'FTAToolErrorController@index');

//FTATOOLとはの記述
Route::get('ftatool_description', 'FTAToolDescriptionController@index');
//実装機能ページの記述
Route::get('implementationFunction', 'FTAToolImplementationController@index');

//Gateによるユーザー別でのアクセス制限
Route::group(['middleware' => ['auth', 'can:admin-only']],function(){
  Route::post('errorpage', 'FTAToolErrorController@store');
  Route::post('errorpage/update/{id}', 'FTAToolErrorController@update');
  Route::post('errorpage/delete/{id}', 'FTAToolErrorController@remove');
});

//投稿画面の記述
Route::post('errorpage/post/{id}', 'FTAToolErrorController@show');
Route::get('post', 'FTAToolPostController@index');
Route::post('post/store/{id}', 'FTAToolPostController@store');
Route::post('post/update/{id}', 'FTAToolPostController@update');
Route::post('post/delete/{id}', 'FTAToolPostController@remove');

//プロフィール画面の記述
Route::get('profile', 'FTAToolProfileController@index');
Route::post('profile', 'FTAToolProfileController@store');
Route::post('profile/updateName', 'FTAToolProfileController@updateName');
Route::post('profile/updateEmail', 'FTAToolProfileController@updateEmail');
Route::post('profile/remove', 'FTAToolProfileController@remove');

//いいね機能のルーティング
Route::post('post/{post}/likes', 'LikesController@store');
Route::post('like/{id}', 'LikesController@destroy');

// Authパス設定
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
