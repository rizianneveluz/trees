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

			/*$fasta = ">".$body->record->processid . "|" .  $body->record->taxonomy->species->taxon->name . "|" . $body->record->sequences->sequence->markercode . "|" . $body->record->sequences->sequence->genbank_accession . "\n" . $body->record->sequences->sequence->nucleotides;
			$file = 'M6CC/fasta.fas';
			file_put_contents($file, $fasta);*/

			$taxon['record_id'] = (string) $body->record->recordID;
			$taxon['institution_storing'] = (string) $body->record->specimen_identifiers->institution_storing;
			$taxon['collector'] = (string) $body->record->collection_event->collectors;
			$taxon['collection_country'] = (string) $body->record->collection_event->country;
			$taxon['phylum'] = (string) $body->record->taxonomy->phylum->taxon->name;
			$taxon['class'] = (string) $body->record->taxonomy->class->taxon->name;
			$taxon['order'] = (string) $body->record->taxonomy->order->taxon->name;
			$taxon['family'] = (string) $body->record->taxonomy->family->taxon->name;
			$taxon['genus'] = (string) $body->record->taxonomy->genus->taxon->name;
			$taxon['species'] = (string) $body->record->taxonomy->species->taxon->name;
			$taxon['marker_code'] = (string) $body->record->sequences->sequence->markercode;
			$taxon['sequence_last_updated'] = (string) $body->record->sequences->last_updated;
		}
		else {
			$taxon = -1;
		}
		return Redirect::to('/')->with('taxon', $taxon);
	}

	public function storeFullData($body) {
			$taxon = new Taxon;
			$taxon->record_id = $body->record->recordID;
			$taxon->process_id = $body->record->processid;
			$taxon->sample_id = $body->record->specimen_identifiers->sampleid;
			$taxon->field_num = $body->record->specimen_identifiers->fieldnum;
			$taxon->catalog_num = $body->record->specimen_identifiers->catalognum;
			$taxon->institution_storing = $body->record->specimen_identifiers->institution_storing;
			$taxon->phylum_id = $body->record->taxonomy->phylum->taxon->taxID;
			$taxon->phylum_name = $body->record->taxonomy->phylum->taxon->name;
			$taxon->class_id = $body->record->taxonomy->class->taxon->taxID;
			$taxon->class_name = $body->record->taxonomy->class->taxon->name;
			$taxon->order_id = $body->record->taxonomy->order->taxon->taxID;
			$taxon->order_name = $body->record->taxonomy->order->taxon->name;
			$taxon->family_id = $body->record->taxonomy->family->taxon->taxID;
			$taxon->family_name = $body->record->taxonomy->family->taxon->name;
			$taxon->subfamily_id = $body->record->taxonomy->subfamily->taxon->taxID;
			$taxon->subfamily_name = $body->record->taxonomy->subfamily->taxon->name;
			$taxon->genus_id = $body->record->taxonomy->genus->taxon->taxID;
			$taxon->genus_name = $body->record->taxonomy->genus->taxon->name;
			$taxon->species_id = $body->record->taxonomy->species->taxon->taxID;
			$taxon->species_name = $body->record->taxonomy->species->taxon->name;
			$taxon->collector = $body->record->collection_event->collectors;
			$taxon->collection_country = $body->record->collection_event->country;
			$taxon->sequence_id = $body->record->sequences->sequence->sequenceID;
			$taxon->marker_code = $body->record->sequences->sequence->markercode;
			$taxon->genbank_accession = $body->record->sequences->sequence->genbank_accession;
			$taxon->nucleotides = $body->record->sequences->sequence->nucleotides;
			$taxon->nucleotides_last_updated = $body->record->sequences->sequence->last_updated;
			$taxon->sequence_last_updated = $body->record->sequences->last_updated;
			$taxon->notes = $body->record->sequences->sequence->notes;
			$taxon->save();

			return Redirect::to('/');
	}

	public function sequenceChosen() {
		$num = Session::get('sequences_num');
		Session::put('sequences_num', ++$num);
		return Redirect::to('/');
	}
}
?>