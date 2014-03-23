<?php

class Record extends Eloquent {

		public $incrementing = false;
		//public static $key = 'record_id';

		// MASS ASSIGNMENT -------------------------------------------------------
		// define which attributes are mass assignable (for security)
		// we only want these 3 attributes able to be filled
		protected $fillable = array('id', 'process_id', 'institution_storing', 'phylum_name', 'class_name', 'order_name', 'family_name', 'subfamily_name', 'genus_name', 'species_name', 'sequence_id', 'marker_code', 'genbank_accession', 'nucleotides', 'nucleotides_last_updated', 'sequence_last_updated', 'notes');

		// DEFINE RELATIONSHIPS --------------------------------------------------
		public function users() {
			return $this->belongsToMany('User', 'records_users', 'record_id', 'user_id');
		}

		public function collectors() {
			return $this->belongsToMany('Collector', 'collectors_records', 'record_id', 'collector_id');
		}

		public function countries() {
			return $this->belongsToMany('Country', 'countries_records', 'record_id', 'country_id');
		}

}