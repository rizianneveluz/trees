<?php

class Country extends Eloquent {
	
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we only want these 3 attributes able to be filled
	protected $fillable = array('name');

	// LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
	// since the plural of country isn't derived simply by adding an 's'
	protected $table = 'countries';

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function records() {
		return $this->belongsToMany('Record', 'countries_records', 'country_id', 'record_id');
	}
	
}