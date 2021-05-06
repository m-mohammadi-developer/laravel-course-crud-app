<?php

Route::get('/', "HomeController@index");

Route::resource('post', 'PostController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
