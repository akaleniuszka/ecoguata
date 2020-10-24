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


Route::view('/', 'welcome')->name('home');
Route::view('admin', 'admin.admin')->name('dashboard');

// Rutas de los estados (más adelante serán los viajes)
Route::get('statuses', 'StatusesController@index')->name('statuses.index');
Route::get('statuses/{status}', 'StatusesController@show')->name('statuses.show');
Route::post('statuses', 'StatusesController@store')->name('statuses.store')->middleware('auth');
Route::get('travel-create', 'StatusesController@create')->name('travel.create')->middleware('auth');

// Rutas de los likes de los estados (más adelante serán los likes de los viajes)
Route::post('statuses/{status}/likes', 'StatusLikesController@store')->name('statuses.likes.store')->middleware('auth');
Route::delete('statuses/{status}/likes', 'StatusLikesController@destroy')->name('statuses.likes.destroy')->middleware('auth');

// Rutas de los comentarios de los estados
Route::post('statuses/{status}/comments', 'StatusCommentsController@store')->name('statuses.comments.store')->middleware('auth');

// Rutas de los comentarios de los likes
Route::post('comments/{comment}/likes', 'CommentLikesController@store')->name('comments.likes.store')->middleware('auth');
Route::delete('comments/{comment}/likes', 'CommentLikesController@destroy')->name('comments.likes.destroy')->middleware('auth');

// Rutas de los usuarios
Route::get('@{user}', 'UsersController@show')->name('users.show')->middleware('auth');
Route::get('@{user}/edit', 'UsersController@edit')->name('users.edit')->middleware('auth');
Route::post('@{user}/edit', 'UsersController@update_avatar')->name('users.update')->middleware('auth');
Route::patch('@{user}/edit', 'UsersController@update')->name('users.update')->middleware('auth');

// Rutas de amigos
Route::get('friends', 'FriendsController@index')->name('friends.index')->middleware('auth');

// Rutas de los estados de los usuarios
Route::get('users/{user}/statuses', 'UserStatusController@index')->name('users.statuses.index')->middleware('auth');

// Rutas de amistad
Route::get('friendships/{recipient}', 'FriendshipsController@show')->name('friendships.show')->middleware('auth');
Route::post('friendships/{recipient}', 'FriendshipsController@store')->name('friendships.store')->middleware('auth');
Route::delete('friendships/{user}', 'FriendshipsController@destroy')->name('friendships.destroy')->middleware('auth');

// Rutas de solicitud de amistad
Route::get('friends/requests', 'AcceptFriendshipsController@index')->name('accept-friendships.index')->middleware('auth');
Route::post('accept-friendships/{sender}', 'AcceptFriendshipsController@store')->name('accept-friendships.store')->middleware('auth');
Route::delete('accept-friendships/{sender}', 'AcceptFriendshipsController@destroy')->name('accept-friendships.destroy')->middleware('auth');

// Rutas de las notificaciones
Route::get('notifications', 'NotificationsController@index')->name('notifications.index')->middleware('auth');

// Rutas de las notificaciones leidas
Route::post('read-notifications/{notification}', 'ReadNotificationsController@store')->name('read-notifications.store')->middleware('auth');
Route::delete('read-notifications/{notification}', 'ReadNotificationsController@destroy')->name('read-notifications.destroy')->middleware('auth');

Route::auth();

// Proveedores sociales para el login
Route::get('/provider/{provider}', 'Auth\LoginController@redirectToProvider')->name('redirectToProvider');
Route::get('/provider/{provider}/callback', 'Auth\LoginController@handleProviderCallback');