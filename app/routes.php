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
Route::get('align', 'HomeController@getAlign');
Route::get('analyze', 'HomeController@getAnalyze');
Route::get('draw', 'HomeController@getDraw');
Route::get('viewAlignment', 'HomeController@viewAlignment');
Route::any('taxon', array('as' => 'taxonControllerPostFullData', 'uses' => 'TaxonController@postFullData'));
Route::any('postTaxon/{number}', function($number) {
	switch ($number) {
		case 1:
			$taxon = "Lycopersicon Esculentum";
			break;
		case 2:
			$taxon = "Allium Cepa";
			break;
		case 3:
			$taxon = "Brassica Oleracea";
			break;
		case 4:
			$taxon = "Capsicum Annuum";
			break;
		case 5:
			$taxon = "Cucurbita Moschata";
			break;
		case 6:
			$taxon = "Glycine Max";
			break;
		case 7:
			$taxon = "Abelmoschus Esculantus";
			break;
		case 8:
			$taxon = "Pisum Sativum";
			break;
		case 9:
			$taxon = "Psophocarpus Tetragonolobus";
			break;
		case 10:
			$taxon = "Cucumis Sativus";
			break;
		case 11:
			$taxon = "Solanum Tuberasum";
			break;
		case 12:
			$taxon = "Rapnus Sativus";
			break;
		case 13:
			$taxon = "Spinacia Oleracea";
			break;
		case 14:
			$taxon = "Daucas Carota";
			break;
		case 15:
			$taxon = "Momordica Charantia";
			break;
		case 16:
			$taxon = "Ananas Comosus";
			break;
		case 17:
			$taxon = "Annona Reticulata";
			break;
		case 18:
			$taxon = "Carica Papaya";
			break;
		case 19:
			$taxon = "Malus Pumila";
			break;
		case 20:
			$taxon = "Zea Mays";
			break;
	}
	$_POST['taxon'] = $taxon;
	return Redirect::to('taxon');
});

Route::post('postPhylogenyJobStatus', 'TaxonController@postPhylogenyJobStatus');
Route::post('postAnalyze', 'TaxonController@postAnalyze');
Route::post('postJobStatus', 'TaxonController@postJobStatus');
Route::post('postAlign', 'TaxonController@postAlign');
Route::post('sequenceChosen', 'TaxonController@sequenceChosen');
Route::post('login', 'HomeController@postLogin');
Route::post('register', 'HomeController@postRegister');