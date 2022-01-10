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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/admin/addAdmin','AdminController@showAllAdmin')->middleware('admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@index')->middleware('admin');
Route::get('/admin/showLecturer','AdminController@showLecturer')->middleware('admin');
Route::get('/admin/showSession','AdminController@showSession')->middleware('admin');
Route::get('/admin/showTerm','AdminController@showTerm')->middleware('admin');
Route::get('/admin/showAll','AdminController@showAll')->middleware('admin');
Route::get('/download/{id}','AdminController@download')->middleware('admin')->name('download');
Route::get('lecturer/{id}','LecturerController@show')->name('detail_lecturer');
Route::get('session/{id}','SessionController@show')->name('detail_session');
Route::get('addClass/{id}', 'ClassController@show')->name('add_class');
Route::post('term/status', 'TermController@update_status');
Route::post('class', 'ClassController@store')->name('save_class');
Route::get('test', 'PkmController@test');
Route::get('pkm/class/{id}','PkmController@getClass');
Route::resource('pkm','PkmController');
Route::resource('lecturer', 'LecturerController');
Route::resource('session', 'SessionController');
Route::resource('upload', 'UploadController');
Route::resource('adminRegis','RegisterAdminController');
Route::resource('term','TermController');
