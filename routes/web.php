<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return \View::make('welcome');
});
Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
	Route::get('/', 'AdminCtrl@index');
	#############   candidate   ##########################
	Route::get('/catidate-change-status/{id}/{examid}/{status}', 'CommonCtrl@create');
	Route::get('/get-exam-wise/{examid}', 'CommonCtrl@show');
	Route::get('/candidates', 'CommonCtrl@index');
	#############   exam   ##########################
	Route::post('/exam-from', 'ExamCtrl@store');
	Route::resource('/exam', 'ExamCtrl');
	#############   exam set   ##########################
	Route::get('/exam-set-delete/{setid}', 'ExamSetCtrl@destroy');
	Route::get('/get-setnos/{examid}', 'ExamSetCtrl@show');
	Route::post('/exam-set-from', 'ExamSetCtrl@store');
	Route::resource('/exam-set', 'ExamSetCtrl');
	#############   question   ##########################
	Route::get('/question-delete/{id}', 'ExamQuesCtrl@destroy');
	Route::post('/exam-que-from', 'ExamQuesCtrl@store');
	Route::resource('/exam-question', 'ExamQuesCtrl');
});
