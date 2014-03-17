<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where all of the routes for the application are registered.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login', 'HomeController@getLogin');
Route::get('register', 'HomeController@getRegister');
Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@getIndex'));
Route::get('logout', 'HomeController@getLogout');
Route::get('sequenceChosen', 'TaxonController@sequenceChosen');

Route::post('login', 'HomeController@postLogin');
Route::post('register', 'HomeController@postRegister');
Route::post('taxon', 'TaxonController@postFullData');

