<?php

set_time_limit(0);

use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

class TaxonController extends BaseController {

	public function postFullData() {

		$query = "/index.php/API_Public/combined?";
		$first = TRUE;

		foreach ($_POST as $key => $parameter) {
			if ($key == '_token' || $parameter == null) {
				continue;
			}
			else if ($first) {
				$query = $query . $key . "=" . rawurlencode($parameter);
				$first = FALSE;
			}
			else {
				$query = $query . "&" . $key . "=" . rawurlencode($parameter);
			}
		}
		$query = $query . "&combined_download=xml";

		$client = new Client("http://www.boldsystems.org");
		$request = $client->get($query);
		$response = $request->send();
		$body = $response->xml();

		if (isset($body->record)) {
			
			$record = Record::firstOrCreate(array(
				'id' => (isset($body->record->recordID) ? (string) $body->record->recordID : null),
				'process_id' => (isset($body->record->processid) ? (string) $body->record->processid : null),
				'institution_storing' => (isset($body->record->specimen_identifiers->institution_storing) ? (string) $body->record->specimen_identifiers->institution_storing : null),			
				'phylum_name' => (isset($body->record->taxonomy->phylum->taxon->name) ? (string) $body->record->taxonomy->phylum->taxon->name : null),
				'class_name' => (isset($body->record->taxonomy->class->taxon->name) ? (string) $body->record->taxonomy->class->taxon->name : null),
				'order_name' => (isset($body->record->taxonomy->order->taxon->name) ? (string) $body->record->taxonomy->order->taxon->name : null),
				'family_name' => (isset($body->record->taxonomy->family->taxon->name) ? (string) $body->record->taxonomy->family->taxon->name : null),
				'subfamily_name' => (isset($body->record->taxonomy->subfamily->taxon->name) ? (string) $body->record->taxonomy->subfamily->taxon->name : null),
				'genus_name' => (isset($body->record->taxonomy->genus->taxon->name) ? (string) $body->record->taxonomy->genus->taxon->name : null),
				'species_name' => (isset($body->record->taxonomy->species->taxon->name) ? (string) $body->record->taxonomy->species->taxon->name : null),
				'sequence_id' => (isset($body->record->sequences->sequence->sequenceID) ? (int) $body->record->sequences->sequence->sequenceID : null),
				'marker_code' => (isset($body->record->sequences->sequence->markercode) ? (string) $body->record->sequences->sequence->markercode : null),
				'genbank_accession' => (isset($body->record->sequences->sequence->genbank_accession) ? (string) $body->record->sequences->sequence->genbank_accession : null),
				'nucleotides' => (isset($body->record->sequences->sequence->nucleotides) ? (string) $body->record->sequences->sequence->nucleotides : null),
				'nucleotides_last_updated' => (isset($body->record->sequences->sequence->last_updated) ? (string) $body->record->sequences->sequence->last_updated : null),
				'sequence_last_updated' => (isset($body->record->last_updated) ? (string) $body->record->last_updated : null),
				'notes' => (isset($body->record->sequences->sequence->notes) ? (string) $body->record->sequences->sequence->notes : null)
			));

			$collector = Collector::firstOrCreate(array('name' => (string) $body->record->collection_event->collectors));

			$country = Country::firstOrCreate(array('name' => (string) $body->record->collection_event->country));

			if (!$record->collectors->contains($collector->id)) {
				$record->collectors()->attach($collector->id);
			}
			if (!$record->countries->contains($country->id)) {
				$record->countries()->attach($country->id);
			}

			if (isset($body->record->recordID)) {
				$taxonCookie['record_id'] = (string) $body->record->recordID;
			}
			if (isset($body->record->processid)) {
				$taxonCookie['process_id'] = (string) $body->record->processid;
			}
			if (isset($body->record->specimen_identifiers->institution_storing)) {
				$taxonCookie['institution_storing'] = (string) $body->record->specimen_identifiers->institution_storing;
			}
			if (isset($body->record->collection_event->collectors)) {
				$taxonCookie['collector'] = (string) $body->record->collection_event->collectors;
			}
			if (isset($body->record->collection_event->country)) {
				$taxonCookie['collection_country'] = (string) $body->record->collection_event->country;
			}
			if (isset($body->record->taxonomy->phylum->taxon->name)) {
				$taxonCookie['phylum'] = (string) $body->record->taxonomy->phylum->taxon->name;
			}
			if (isset($body->record->taxonomy->class->taxon->name)) {
				$taxonCookie['class'] = (string) $body->record->taxonomy->class->taxon->name;
			}
			if (isset($body->record->taxonomy->order->taxon->name)) {
				$taxonCookie['order'] = (string) $body->record->taxonomy->order->taxon->name;
			}
			if (isset($body->record->taxonomy->family->taxon->name)) {
				$taxonCookie['family'] = (string) $body->record->taxonomy->family->taxon->name;
			}
			if (isset($body->record->taxonomy->subfamily->taxon->name)) {
				$taxonCookie['subfamily'] = (string) $body->record->taxonomy->subfamily->taxon->name;
			}
			if (isset($body->record->taxonomy->genus->taxon->name)) {
				$taxonCookie['genus'] = (string) $body->record->taxonomy->genus->taxon->name;
			}
			if (isset($body->record->taxonomy->species->taxon->name)) {
				$taxonCookie['species'] = (string) $body->record->taxonomy->species->taxon->name;
			}
			if (isset($body->record->sequences->sequence->markercode)) {
				$taxonCookie['marker_code'] = (string) $body->record->sequences->sequence->markercode;
			}
			if (isset($body->record->last_updated)) {
				$taxonCookie['sequence_last_updated'] = (string) $body->record->last_updated;
			}		
		}
		else {
			$taxonCookie = -1;
		}
		Session::forget('taxon');
		return Redirect::to('/')->with('taxon', $taxonCookie);
	}

	public function sequenceChosen() {
		$num = Session::get('sequences_num');
		Session::put('sequences_num', ++$num);
		$taxon = Input::get('taxon');
		$record_id = $taxon['record_id'];
		$record = Record::where('id', '=', $record_id)->first();
		$user_id = Auth::user()->id;
		$user = User::find($user_id);

		if (!$user->records->contains($record_id)) {
			$user->records()->attach($record->id);
		}

		$current = new Current;
		$current->record_id = $record->id;
		$current->save();
	}

	public function postAlign() {

		$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalo/run/';
		$data = array(
			'email' => Auth::user()->email,
			'title' => "My First Alignment",
			'outfmt' => "fa",
			'sequence' => Input::get('sequences'));

		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => "POST",
		        'content' => http_build_query($data),
		    ),
		);
		$context  = stream_context_create($options);
		$job_id = file_get_contents($url, false, $context);

		/* ---------------------------------------------------- */

		$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalo/status/' . rawurlencode($job_id);

		$job_status = file_get_contents($url);
		$result = '';

		if ($job_status == 'FINISHED') {
			$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalo/result/' . rawurlencode($job_id) . '/aln-fasta';

			$result = file_get_contents($url);
		}

		Session::put('job_data', array('job_id' => $job_id, 'job_status' => $job_status, 'result' => $result));

		return Redirect::to('align');
	}

	public function postJobStatus() {

		$job_data = Session::get('job_data');
		$job_id = $job_data['job_id'];

		$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalo/status/' . rawurlencode($job_id);

		$job_status = file_get_contents($url);
		$result = '';

		if ($job_status == 'FINISHED') {
			$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalo/result/' . rawurlencode($job_id) . '/aln-fasta';

			$result = file_get_contents($url);
		}
		
		Session::put('job_data', array('job_id' => $job_id, 'job_status' => $job_status, 'result' => $result));

		return Redirect::to('align');
	}

	public function postAnalyze() {

		$alignment = Input::get('alignment');

		if (Session::has('job_data')) {
			$job_data = Session::get('job_data');
			if (isset($job_data['job_id'])) {
				$job_id = $job_data['job_id'];
			}
			else {
				$job_id = '';
			}
			if (isset($job_data['job_status'])) {
				$job_status = $job_data['job_status'];
			}
			else {
				$job_status = '';
			}
		}

		$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalw2_phylogeny/run/';
		$data = array(
			'email' => Auth::user()->email,
			'title' => "Phylogeny",
			'tree' => "phylip",
			'sequence' => $alignment);

		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => "POST",
		        'content' => http_build_query($data),
		    ),
		);
		$context  = stream_context_create($options);
		$phylogeny_job_id = file_get_contents($url, false, $context);

		/* ---------------------------------------------------- */

		$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalw2_phylogeny/status/' . rawurlencode($phylogeny_job_id);

		$phylogeny_job_status = file_get_contents($url);
		$tree = '';

		if ($phylogeny_job_status == 'FINISHED') {
			$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalw2_phylogeny/result/' . rawurlencode($phylogeny_job_id) . '/tree';

			$tree = file_get_contents($url);
			$list = array("\n", " ");
			$tree = str_replace($list, "", $tree);
		}

		Session::put('job_data', array('job_id' => $job_id, 'job_status' => $job_status, 'result' => $alignment, 'phylogeny_job_id' => $phylogeny_job_id, 'phylogeny_job_status' => $phylogeny_job_status, 'tree' => $tree));

		return Redirect::to('analyze');

	}

	public function postPhylogenyJobStatus() {

		if (Session::has('job_data')) {
			$job_data = Session::get('job_data');
			if (isset($job_data['phylogeny_job_id'])) {
				$phylogeny_job_id = $job_data['phylogeny_job_id'];
			}
			else {
				$phylogeny_job_id = '';
			}
			if (isset($job_data['phylogeny_job_status'])) {
				$phylogeny_job_status = $job_data['phylogeny_job_status'];
			}
			else {
				$phylogeny_job_status = '';
			}
			if (isset($job_data['job_id'])) {
				$job_id = $job_data['job_id'];
			}
			else {
				$job_id = '';
			}
			if (isset($job_data['job_status'])) {
				$job_status = $job_data['job_status'];
			}
			else {
				$job_status = '';
			}
			if (isset($job_data['result'])) {
				$result = $job_data['result'];
			}
			else {
				$result = '';
			}
		}

		$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalw2_phylogeny/status/' . rawurlencode($phylogeny_job_id);

		$phylogeny_job_status = file_get_contents($url);
		$tree = '';

		if ($phylogeny_job_status == 'FINISHED') {
			$url = 'http://www.ebi.ac.uk/Tools/services/rest/clustalw2_phylogeny/result/' . rawurlencode($phylogeny_job_id) . '/tree';

			$tree = file_get_contents($url);
			$list = array("\n", " ");
			$tree = str_replace($list, "", $tree);
		}
		
		Session::put('job_data', array('job_id' => $job_id, 'job_status' => $job_status, 'result' => $result, 'phylogeny_job_id' => $phylogeny_job_id, 'phylogeny_job_status' => $phylogeny_job_status, 'tree' => $tree));

		return Redirect::to('analyze');
	}

	public function truncateTables() {
		Collector::truncate();
		Country::truncate();
		Record::truncate();
		DB::table('collectors_records')->truncate();
		DB::table('countries_records')->truncate();
		DB::table('records_users')->truncate();
		Session::put('sequences_num', 0);
		Session::forget('taxon');
		return Redirect::to('/');
	}
}
?>