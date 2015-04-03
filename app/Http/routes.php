<?php

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function () {

    /*
     * Home
     */
    Route::get('/', function () {
        return view('master');
    });

    Route::resource('notes', 'NotesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('platforms', 'PlatformsController');
    Route::resource('languages', 'LanguagesController');
    Route::resource('frameworks', 'FrameworksController');
    Route::resource('tags', 'TagsController');

    Route::post('search/{search}', ['as' => 'search', 'uses' => 'NotesController@search']);

});

