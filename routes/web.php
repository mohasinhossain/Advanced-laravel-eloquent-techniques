<?php

Auth::loginUsingId(1);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('subscriptions', 'SubscriptionsController');
Route::get('document/{document}', 'DocumentsController@show');
Route::get('lessons', 'LessonController@index');
