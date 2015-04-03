<?php

/*
 * Home
 */
Route::get('/', function () {
    return view('master');
});
/*
 * Articles
 */
Route::resource('notes', 'NotesController');
Route::resource('categories', 'CategoriesController');
Route::resource('platforms', 'PlatformsController');
Route::resource('languages', 'LanguagesController');
Route::resource('frameworks', 'FrameworksController');
Route::resource('tags', 'TagsController');

Route::post('search/{search}', ['as' => 'search', 'uses' => 'NotesController@search']);

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
