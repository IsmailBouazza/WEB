<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/email-send','MailController@mailsend');


/*  Item  */

Route::get('/', 'ItemController@showHome');
Route::get('/home', 'ItemController@showHome');
Route::resource('Item','ItemController');
Route::get('/items/myitems/{user}', 'ItemController@index');
Route::put('/Item/{id}/delete','ItemController@destroy')->name('Item.delete');
Route::post('/addToFavorites/{id}','FavoriteController@addToFavorites');
Route::get('myfavorites','FavoriteController@showMyFavorites');
Route::post('myfavorites/{id}','FavoriteController@destroyfavorite');
Route::post('/report/{id}','ItemReportController@report');

/*  Item Photo  */


Route::resource('ItemPhoto','ItemPhotoController');



/*  User  */


Route::get('/users', 'UserController@index');
Route::get('/user/delete/{user}', 'UserController@delete');
Route::resource('user', 'UserController');
/* chat */
Route::get('/chat','MessageController@index');
Route::get('/chat/{id}', 'MessageController@getMessage')->name('message');
Route::post('/chat','MessageController@sendMessage');


/*  Admin  */

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::get('/admin', 'AdminController@show');
Route::get('/items', 'AdminController@index');

//admin premium
Route::get('/premium','ItemPremiumController@request');

Route::put('/premium/{id}/approve','ItemPremiumController@approval')->name('premium.approve');
Route::put('/premium/{id}/refuse','ItemPremiumController@destroy')->name('premium.refuse');

//admin reported items

Route::get('/reported','ItemReportController@show');

Route::put('/reported/{id}/approve','ItemReportController@approval')->name('reported.approve');
Route::put('/reported/{id}/refuse','ItemReportController@destroy')->name('reported.refuse'); 


// admin delete
Route::post('/userblockunblock', 'UserController@block');
//Route::get('/useroperation/{user}', 'UserController@usersajaxfetch');  // for testing
Route::post('/useroperation', 'UserController@usersajaxfetch');


/*  Category  */


Route::resource('Category','CategoryController');

/*  Reservation  */

Route::resource('Reservation','ReservationController');

Route::get('/MyAnnounces','ReservationController@announces');
Route::get('/MyReservations','ReservationController@reservations');

Route::put('/MyRequests/{id}/approve','ReservationController@approval')->name('MyRequests.approve');
Route::put('/MyRequests/{id}/refuse','ReservationController@destroy')->name('MyRequests.refuse');
Route::post('/reser', 'ReservationController@store');
Route::get('/reservations', 'ReservationController@index');
Route::post('/cancelreservation/{id}','ReservationController@userCancel');

// reservations notification
Route::post('/reservationsnotification', 'ReservationController@reservationsajaxfetch');





/*  Premium  */
Route::resource('Premium','ItemPremiumController');





/*Search*/
Route::post('/search', 'SearchController@showResults');
Route::get('/item/{id}','SearchController@showItem');




/*Comment*/
Route::post('comment','ItemCommentController@store');


