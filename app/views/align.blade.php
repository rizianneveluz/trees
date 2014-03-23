@extends('layouts.master')

@section('breadcrumb')
	<li><a href="{{ URL::to('/') }}">Search</a></li>
	<li class="active"><a href="{{ URL::to('align') }}">Align</a></li>
@stop

@section('assemblyLinePart')
	<h1 class="page-header"> Multiple Sequence Alignment </h1>
@stop

@section('body')

	<?php
		if(!isset($fasta)) {
			$fasta = '';
		}
	?>

	{{ Form::open(array('id' => 'searchForm', 'url' => 'postAlign')) }}
		<div class="form-group">
			{{ Form::label('sequences', 'Sequences') }}
			<textarea class="form-control" name="sequences" id="sequences" placeholder="Past sequences here" title="Paste sequences here" rows="15" cols="70"> {{ $fasta }} </textarea>
		</div>
		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'form-control')) }}
		</div>
	{{ Form::close() }}

@stop


@section('jobResult')
	
	<h3 class="page-header"> Job Result </h3>

		<?php
			if(Session::has('job_data')) {
				$job_data = Session::get('job_data');
				$job_id = $job_data['job_id'];
				$job_status = $job_data['job_status'];
			}
			else {
				$job_id = '--';
				$job_status = '--';
			}

			echo "<p><strong> Job ID: </strong>" . $job_id . "</p>";
			echo "<p><strong> Job Status: </strong>" . $job_status . "</p>";
		?>

		<a href="{{ URL::to('getJobStatus', array('job_id' => $job_id)) }}" class="btn btn-primary"> Check Status </a>

		@if(isset($job_data['result']))
			<button type="button" class="btn btn-success" id="ViewAlignment">View Alignment</button>
		@endif
@stop