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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/member-create', 'MemberController@index')->name('member-create');
Route::post('/member-store', 'MemberController@store')->name('member-store');
Route::get('/member-edit/{id}', 'MemberController@edit')->name('member-edit');
Route::patch('/member-update/{id}','MemberController@update')->name('member-update');
Route::get('/member-delete/{id}', 'MemberController@destroy')->name('member-delete');

