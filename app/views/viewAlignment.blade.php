@extends('layouts.master')

@section('breadcrumb')
	<li><a href="{{ URL::to('/') }}">Search</a></li>
	<li><a href="{{ URL::to('align') }}">Align</a></li>
	<li><a href="{{ URL::to('analyze') }}">Analyze</a></li>
	<li><a href="{{ URL::to('draw') }}">Draw</a></li>
@stop

@section('assemblyLinePart')
	<h1 class="page-header"> Multiple Sequence Alignment </h1>
@stop

@section('body')
	
		<?php
			if (Session::has('job_data')) {
				$job_data = Session::get('job_data');
				if (isset($job_data['result'])) {
					$alignment = $job_data['result'];
				}

				if (isset($alignment)) {
					echo '<font size="1">'  . $alignment . "</font>";
				}
			}
		?>
@stop