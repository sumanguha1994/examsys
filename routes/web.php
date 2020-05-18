<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return \View::make('welcome');
});
Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
	//Route::get('/exam', 'admin/ExamCtrl@index');
	Route::get('/', 'AdminCtrl@index');
	Route::get('/candidates', 'CommonCtrl@index');
	Route::post('/exam-from', 'ExamCtrl@store');
	Route::resource('/exam', 'ExamCtrl');
	Route::post('/exam-set-from', 'ExamSetCtrl@store');
	Route::resource('/exam-set', 'ExamSetCtrl');
	Route::post('/exam-que-from', 'ExamQuesCtrl@store');
	Route::resource('/exam-question', 'ExamQuesCtrl');
});
