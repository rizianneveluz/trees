<?php

	if (!is_null($body)) {
		echo $body->record->sequences->sequence->nucleotides . "<hr />";
	}
	else {
		echo 'No results found. <br />';
	}
?>