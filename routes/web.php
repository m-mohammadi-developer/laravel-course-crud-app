<?php

Route::get('/', "HomeController@index");

Route::resource('post', 'PostController');