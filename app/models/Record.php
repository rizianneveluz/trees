<?php

class Record extends Eloquent {

		public $incrementing = false;
		//public static $key = 'record_id';

		// MASS ASSIGNMENT -------------------------------------------------------
		// define which attributes are mass assignable (for security)
		// we only want these 3 attributes able to be filled
		protected $fillable = array('id', 'institution_storing', 'phylum_name', 'class_name', 'order_name', 'family_name', 'subfamily_name', 'genus_name', 'species_name', 'sequence_id', 'marker_code', 'genbank_accession', 'nucleotides', 'nucleotides_last_updated', 'sequence_last_updated', 'notes', 'user_id');

		// DEFINE RELATIONSHIPS --------------------------------------------------
		public function user() {
			return $this->belongsTo('User');
		}

		public function collectors() {
			return $this->hasMany('Collector');
		}

		public function countries() {
			return $this->hasMany('Country');
		}

}