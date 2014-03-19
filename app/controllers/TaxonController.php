<?php

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
				'id' => (int) $body->record->recordID,
				'institution_storing' => (string) $body->record->specimen_identifiers->institution_storing,
				'phylum_name' => (string) $body->record->taxonomy->phylum->taxon->name,
				'class_name' => (string) $body->record->taxonomy->class->taxon->name,
				'order_name' => (string) $body->record->taxonomy->order->taxon->name,
				'family_name' => (string) $body->record->taxonomy->family->taxon->name,
				//'subfamily_name' => (string) $body->record->taxonomy->subfamily->taxon->name,
				'genus_name' => (string) $body->record->taxonomy->genus->taxon->name,
				'species_name' => (string) $body->record->taxonomy->species->taxon->name,
				'sequence_id' => (int) $body->record->sequences->sequence->sequenceID,
				'marker_code' => (string) $body->record->sequences->sequence->markercode,
				'genbank_accession' => (string) $body->record->sequences->sequence->genbank_accession,
				'nucleotides' => (string) $body->record->sequences->sequence->nucleotides,
				'nucleotides_last_updated' => (string) $body->record->sequences->sequence->last_updated,
				'sequence_last_updated' => (string)  $body->record->last_updated,
				'notes' => (string) $body->record->sequences->sequence->notes,
				'user_id' => Auth::user(1)->id
			));

			$collector = Collector::firstOrCreate(array('name' => (string) $body->record->collection_event->collectors, 'record_id' => $record->id));

			$country = Country::firstOrCreate(array('name' => (string) $body->record->collection_event->country, 'record_id' => $record->id));

			$taxonCookie['record_id'] = (string) $body->record->recordID;
			$taxonCookie['institution_storing'] = (string) $body->record->specimen_identifiers->institution_storing;
			$taxonCookie['collector'] = (string) $body->record->collection_event->collectors;
			$taxonCookie['collection_country'] = (string) $body->record->collection_event->country;
			$taxonCookie['phylum'] = (string) $body->record->taxonomy->phylum->taxon->name;
			//$taxon['class'] = (string) $body->record->taxonomy->class->taxon->name;
			$taxonCookie['order'] = (string) $body->record->taxonomy->order->taxon->name;
			$taxonCookie['family'] = (string) $body->record->taxonomy->family->taxon->name;
			$taxonCookie['genus'] = (string) $body->record->taxonomy->genus->taxon->name;
			$taxonCookie['species'] = (string) $body->record->taxonomy->species->taxon->name;
			$taxonCookie['marker_code'] = (string) $body->record->sequences->sequence->markercode;
			$taxonCookie['sequence_last_updated'] = (string) $body->record->last_updated;

			$fasta = ">".$body->record->processid . "|" .  $body->record->taxonomy->species->taxon->name . "|" . $body->record->sequences->sequence->markercode . "|" . $body->record->sequences->sequence->genbank_accession . "\n" . $body->record->sequences->sequence->nucleotides;
			$file = 'M6CC/fasta.fas';
			file_put_contents($file, $fasta);
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
		$record->user()->associate($user);
		$record->save();
	}

	public function truncateTables() {
		Collector::truncate();
		Country::truncate();
		Record::truncate();
		Session::put('sequences_num', 0);
		Session::forget('taxon');
		Session::forget('record');
		Session::forget('record_id');
		return Redirect::to('/');
	}
}
?>