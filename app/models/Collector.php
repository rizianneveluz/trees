<?php

class Collector extends Eloquent {

	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we want only these attributes able to be filled
	protected $fillable = array('name');

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function records() {
		return $this->belongsToMany('Record', 'collectors_records', 'collector_id', 'record_id');
	}
}