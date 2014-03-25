@extends('layouts.master')

@section('breadcrumb')
	<li><a href="{{ URL::to('/') }}">Search</a></li>
	<li><a href="{{ URL::to('align') }}">Align</a></li>
	<li class="active"><a href="{{ URL::to('analyze') }}">Analyze</a></li>
@stop

@section('assemblyLinePart')
	<h1 class="page-header"> Phylogenetic Analysis </h1>
@stop

@section('body')
	
	<?php
		if(Session::has('job_data')) {
			$job_data = Session::get('job_data');
			if (isset($job_data['result'])) {
				$alignment = $job_data['result'];
			}
			else {
				$alignment = '--';
			}
		}
		else {
			$alignment = '';
		}
	?>

	{{ Form::open(array('id' => 'searchForm', 'url' => 'postAnalyze')) }}
		<div class="form-group">
			{{ Form::label('alignment', 'Multiple Sequence Alignment') }}
			<textarea class="form-control" name="alignment" id="alignment" placeholder="Paste alignment here" title="Paste alignment here" rows="15" cols="70"> {{ $alignment }} </textarea>
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
				if (isset($job_data['phylogeny_job_id'])) {
					$phylogeny_job_id = $job_data['phylogeny_job_id'];
				}
				else {
					$phylogeny_job_id = '--';
				}
				if (isset($job_data['phylogeny_job_status'])) {
					$phylogeny_job_status = $job_data['phylogeny_job_status'];
				}
				else {
					$phylogeny_job_status = '--';
				}
			}
			else {
				$phylogeny_job_id = '--';
				$phylogeny_job_status = '--';
			}

			echo "<p><strong> Job ID: </strong>" . $phylogeny_job_id . "</p>";
			echo "<p><strong> Job Status: </strong>" . $phylogeny_job_status . "</p>";
		?>

		<hr />

		{{ Form::open(array('id' => 'search-Form', 'url' => 'postPhylogenyJobStatus')) }}
			<div class="form-group">
				{{ Form::label('phylogenyJobId', 'Check Job Status') }}
				{{ Form::text('phylogenyJobId', $phylogeny_job_id, array('class' => 'form-control', 'id' => 'phylogenyJobId', 'placeholder' => 'clustalw2_phylogeny-R20140325-032021-0037-24101107-oy', 'title' => "If you have other jobs whose results you are waiting for, you may check their status by typing here the job id here. If you want to check the current job's status, you may leave this blank.")) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Check Status', array('class' => 'form-control btn btn-primary')) }}
			</div>
		{{ Form::close() }}

		@if(isset($job_data['result']))
			<div class="form-group">
				<button type="button" class="form-control btn btn-info" id="ViewTree">View Tree</button>
			</div>
			<div class="form-group">
				<a href="draw" class="form-control btn btn-success" id="drawButton">Draw Tree</a>
			</div>
		@endif
@stop