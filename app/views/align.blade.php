@extends('layouts.master')

@section('breadcrumb')
	<li><a href="{{ URL::to('/') }}">Search</a></li>
	<li class="active"><a href="{{ URL::to('align') }}">Align</a></li>
	<li><a href="{{ URL::to('analyze') }}">Analyze</a></li>
@stop

@section('assemblyLinePart')
	<h1 class="page-header"> Multiple Sequence Alignment </h1>
@stop

@section('body')

	<?php
		if(!Session::has('fasta')) {
			$fasta = '';
		}
		else {
			$fasta = Session::get('fasta');
		}
	?>

	{{ Form::open(array('id' => 'searchForm', 'url' => 'postAlign')) }}
		<div class="form-group">
			{{ Form::label('sequences', 'Sequences') }}
			<textarea class="form-control" name="sequences" id="sequences" placeholder="Paste sequences here" title="Paste sequences here" rows="15" cols="70"> {{ $fasta }} </textarea>
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
				if (isset($job_data['job_id'])) {
					$job_id = $job_data['job_id'];
				}
				else {
					$job_id = '--';
				}
				if (isset($job_data['job_status'])) {
					$job_status = $job_data['job_status'];
				}
				else {
					$job_status = '--';
				}
			}
			else {
				$job_id = '--';
				$job_status = '--';
			}

			echo "<p><strong> Job ID: </strong>" . $job_id . "</p>";
			echo "<p><strong> Job Status: </strong>" . $job_status . "</p>";
		?>

		<hr />

		{{ Form::open(array('id' => 'search-Form', 'url' => 'postJobStatus')) }}
			<div class="form-group">
				{{ Form::label('jobId', 'Check Job Status') }}
				{{ Form::text('jobId', $job_id, array('class' => 'form-control', 'id' => 'jobId', 'placeholder' => 'clustalo-R20140324-093750-0347-5577870-pg', 'title' => "If you have other jobs whose results you are waiting for, you may check their status by typing here the job id here. If you want to check the current job's status, you may leave this blank.")) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Check Status', array('class' => 'form-control btn btn-primary')) }}
			</div>
		{{ Form::close() }}

		@if(isset($job_data['result']))
			<div class="form-group">
				<button type="button" class="form-control btn btn-info" id="ViewAlignment">View Alignment</button>
			</div>
			<div class="form-group">
				<a href="analyze" class="form-control btn btn-success" id="analyzeButton">Head on to Phylogenetic Analysis</a>
			</div>
		@endif
@stop