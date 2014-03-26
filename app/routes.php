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
Route::get('truncate', 'TaxonController@truncateTables');
Route::get('align', 'HomeController@getAlign');
Route::get('analyze', 'HomeController@getAnalyze');
Route::get('draw', 'HomeController@getDraw');

Route::post('postPhylogenyJobStatus', 'TaxonController@postPhylogenyJobStatus');
Route::post('postAnalyze', 'TaxonController@postAnalyze');
Route::post('postJobStatus', 'TaxonController@postJobStatus');
Route::post('postAlign', 'TaxonController@postAlign');
Route::post('sequenceChosen', 'TaxonController@sequenceChosen');
Route::post('login', 'HomeController@postLogin');
Route::post('register', 'HomeController@postRegister');
Route::post('taxon', 'TaxonController@postFullData');

