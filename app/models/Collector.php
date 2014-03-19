<?php

class Collector extends Eloquent {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we want only these attributes able to be filled
	protected $fillable = array('name', 'record_id');

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function record() {
		return $this->belongsTo('Record');
	}
}