<?php

/*
 * Home
 */
Route::get('/', function() {
   return view('master');
});
/*
 * Articles
 */
Route::resource('articles', 'ArticlesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
