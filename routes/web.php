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





Route::get('about','PagesController@about');
Route::get('index','PagesController@index');


Route::get('free/hall', 'FreehallController@freehall');
Route::get('generate', 'FreehallController@all');


Route::resource('class', 'ClassroomController');
Route::group(['prefix' => '/class'], function () {
    Route::get('/create','ClassroomController@create');
    Route::post('/create','ClassroomController@store');
    Route::post('/edit/{id}','ClassroomController@update');
});

Route::get('schedule/search', 'ScheduleController@search');
Route::resource('schedule', 'ScheduleController');
Route::group(['prefix' => 'schedule'], function () {
    Route::get('/{Day}/{id}','ScheduleController@show')->name('show');
    Route::get('/{CourseCode}/{id}','ScheduleController@showCourse')->name('showCourse');
    Route::post('/create','ScheduleController@store');
    
});


Route::resource('lecturer', 'LecturerController');
Route::group(['prefix' => 'lecturer'], function () {
    Route::get('/search','LecturerController@search');
    Route::post('/create','LecturerController@store');
});


Route::resource('department', 'DepartmentController');
Route::post('department/create','DepartmentController@store');

Route::resource('option', 'OptionController');
Route::post('option/create','OptionController@store');

Route::post('/book/store','BookedhallController@store');
Route::resource('book', 'BookedhallController');
 
Route::resource('course', 'CourseController');
Route::post('course/create','CourseController@store');
Route::get('course/{CourseCode}','CourseController@show');



Route::get('/public',[ 'uses' => 'Auth\LoginController@getLogin', 'as '=>'login' ]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Universal Back Button take you back to prevous View
Route::any('/back', function () {
    return back();
    
})->name('back');