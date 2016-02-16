<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ["as" => "public.welcome" , function () {
    return view('welcome');
}]);

// @todo Make {page} optional and use a regex match

// List profiles (first page)
Route::get(
    'profiles',
    ["as" => "profiles.browse", 'uses' => 'Profile\ProfileController@index']
);

// List profiles by page number
Route::get(
    'profiles/{page}',
    ["as" => "profile.browse", 'uses' => 'Profile\ProfileController@index']
);

// Edit profile (first page)
Route::get(
    'edit/profile',
    ["as" => "profile.edit", 'uses' => 'Profile\ProfileController@editFirstPage']
);

// Edit profile by page number
Route::get(
    'edit/profile/{page}',
    ["as" => "profile.edit", 'uses' => 'Profile\ProfileController@editFirstPage']
);

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
