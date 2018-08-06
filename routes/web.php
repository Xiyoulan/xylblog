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
Auth::routes();
Route::post('/register/verificationCode','Auth\RegisterController@sendVerificationCode')->name('sendVerificationCode');
Route::post('/register/phone','Auth\RegisterController@registerWithPhone')->name('registerWithPhone');
Route::post('/register/supplement','Auth\RegisterController@supplement')->name('supplement');
Route::get('/register/append','Auth\RegisterController@append')->name('append');
Route::get('/','SimplePageController@index');

Route::resource('articles','ArticleController');
Route::post('upload_image', 'ArticleController@uploadImage')->name('articles.uploadImage');

Route::resource('users','UserController',['except'=>'edit']);
Route::get('users/{user}/active/{token?}','UserController@active')->name('active');
Route::put('users/{user}/password','UserController@resetPassword')->name('users.resetPassword');
Route::post('user/{user}/active','UserController@resendConfirmEmail')->name('resendEmail');

Route::resource('replies','ReplyController',['only'=>['store','destroy']]);
Route::get('replies/{reply}/child','ReplyController@showChildReplies')->name('replies.children');
Route::post('replies/upload_image', 'ReplyController@uploadImage')->name('replies.uploadImage');
Route::post('followers/{user}','FollowerController@follow')->name('users.follow');
Route::delete('followers/{user}','FollowerController@unfollow')->name('users.unfollow');
Route::get('user/notifications','NotificationController@index')->name('user.notification');
