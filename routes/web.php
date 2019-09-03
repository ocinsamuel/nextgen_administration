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

Route::get('/', 'HomeController@index')->name('home');

Route::get('qr-code', 'HomeController@generateQRCode')->name('qr-code');

Route::get('attendance/{url}', 'AttendanceController@readURL');
Route::get('fetchattendance/{daterange}/{filter?}', 'AttendanceController@fetchAttendanceByFilter');
Route::post('attend/', 'AttendanceController@attend')->name('attend');


// USERS
Route::prefix('user')->group(function () {
	Route::get('leader', 'UsersController@indexLeader')->name('leader');
	Route::get('pengerja', 'UsersController@indexPengerja')->name('pengerja');
	Route::get('jemaat', 'UsersController@indexJemaat')->name('jemaat');
	Route::get('add','UsersController@addUser')->name('addUser');
	Route::get('edit','UsersController@editUser')->name('editUser');
});

// EVENT
Route::get('event', 'EventController@index')->name('event');
Route::prefix('event')->group(function () {
	Route::get('add','EventController@add')->name('addEvent');
	Route::get('edit','EventController@edit')->name('editEvent');
	Route::get('dates/{id}','EventController@dates');
	Route::get('fetch','EventController@fetch');
});

// BRANCH
Route::get('branch', 'BranchController@index')->name('branch');
Route::prefix('branch')->group(function () {
	Route::get('add','BranchController@add')->name('addBranch');
	Route::get('edit','BranchController@edit')->name('editBranch');
	Route::get('fetch','BranchController@fetch');
});
