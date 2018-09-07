<?php

use Illuminate\Http\Request;

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index2']);

Route::get('reading', ['as' => 'reading', 'uses' => 'HomeController@reading']);

Route::post('post-answer', ['as' => 'post-answer', 'uses' => 'HomeController@post_answer']);

Route::get('previous-page', ['as' => 'previous-page', 'uses' => 'HomeController@previous_page']);

Route::get('result', ['as' => 'result', 'uses' => 'HomeController@result']);


Route::auth();

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 							['as'=>'admin.dashboard', 'uses'=>'AdminController@dashboard']);
    Route::get('questions/create_partials', 	['as'=>'admin.questions.create_partials', 'uses'=>'QuestionController@create_partials']);
    Route::resource('questions','QuestionController');
});

// Route::group(['prefix' => 'admin', 'as'=>'admin'], function () {
//     Route::get('/', 		['as'=>'dashboard', 'uses'=>'AdminController@dashboard']);
// });
    // Route::get('questions', ['as'=>'questions', 'uses'=>'AdminController@questions']);