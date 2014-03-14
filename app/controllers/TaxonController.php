<?php

use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

class TaxonController extends BaseController {
	public function getFullData() {
		createTable();

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
		$data['query'] = $query;
		$data['body'] = $body;

		$fasta = ">".$body->record->processid . "|" .  $body->record->taxonomy->species->taxon->name . "|" . $body->record->sequences->sequence->markercode . "|" . $body->record->sequences->sequence->genbank_accession . "\n" . $body->record->sequences->sequence->nucleotides;
		$file = 'M6CC/fasta.fas';
		file_put_contents($file, $fasta);
		
		return View::make("showDetails", $data);
	}

	public function createTable() {
		Schema::create('taxa', function($table) {
			$table->increments('id');
			$table->string('username', 32);
			$table->string('email', 320);
			$table->string('password', 60);
			$table->timestamps();
		});
	}

	public function align() {
		return "Align";
	}
}
?>