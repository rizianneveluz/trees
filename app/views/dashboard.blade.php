@extends('layouts.master')

@section('cssDeclarations')
	@parent
		{{ HTML::style('css/custom.css') }}
@stop

@section('body')
	<div class="row">

		{{ Form::open(array('id' => 'searchForm', 'url' => 'taxon')) }}
			<div class="form-group">
				{{ Form::label('taxon', 'Taxon') }}
				{{ Form::text('taxon', Input::old(''), array('class' => 'form-control', 'id' => 'taxon', 'placeholder' => 'e.g. Aves', 'title' => "Taxa includes the ranks of phylum, class, order, family, subfamily, genus, and species.
				Examples:
				taxon=Bos taurus returns all records containing Bos taurus.
				taxon=Aves|Reptilia returns all records containing Aves or Reptilia.")) }}
			</div>
			<div class="form-group">
				{{ Form::label('ids', 'IDs') }}
				{{ Form::text('ids', Input::old(''), array('class' => 'form-control', 'id' => 'ids', 'placeholder' => 'e.g. ACRJP618-11', 'title' => 'IDs include Sample IDs, Process IDs, Museum IDs and Field IDs.
				Examples:
				ids=ACRJP618-11|ACRJP619-11 returns records containing matching Process IDs.
				ids=Example 10|Example 11|Example 12 returns records containing matching Sample IDs.')) }}
			</div>
			<div class="form-group">
				{{ Form::label('bin', 'BIN') }}
				{{ Form::text('bin', Input::old(''), array('class' => 'form-control', 'id' => 'bin', 'placeholder' => 'e.g. BOLD:AAA5125', 'title' => 'A BIN is defined by a Barcode Index Number URI.
				Example: bin=BOLD:AAA5125|BOLD:AAA5126 returns records containing matching BIN URIs.')) }}
			</div>
			<div class="form-group">
				{{ Form::label('container', 'Container') }}
				{{ Form::text('container', Input::old(''), array('class' => 'form-control', 'id' => 'container', 'placeholder' => 'e.g. DS-EZROM', 'title' => 'Containers include project codes and dataset codes.
				Examples:
				container=ACRJP|ACRJI returns records contained within matching projects.
				container=DS-EZROM returns records contained within the matching dataset.')) }}
			</div>
			<div class="form-group">
				{{ Form::label('institution', 'Institutions') }}
				{{ Form::text('institution', Input::old(''), array('class' => 'form-control', 'id' => 'institution', 'placeholder' => 'e.g. Biodiversity Institute of Ontario', 'title' => 'Institutions are the Specimen Storing Site. (spaces need to be encoded)
				Example:
				institutions=Biodiversity Institute of Ontario|York University returns records for specimens stored within matching institutions.')) }}
			</div>
			<div class="form-group">
				{{ Form::label('geo', 'Geographical Sites') }}
				{{ Form::text('geo', Input::old(''), array('class' => 'form-control', 'id' => 'geo', 'placeholder' => 'e.g. Canada', 'title' => 'Geographic sites includes countries and province/states. (spaces need to be encoded)
				Example:
				geo=Canada|Alaska returns records for specimens collected in the matching geographic sites.')) }}
			</div>
			<div class="form-group">
				{{ Form::label('marker', 'Markers') }}
				{{ Form::text('marker', Input::old(''), array('class' => 'form-control', 'id' => 'marker', 'placeholder' => 'e.g. matK')) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Submit', array('class' => 'form-control')) }}
			</div>
		{{ Form::close() }}

	</div>

@stop

@section('scripts')
	@if(Session::has('taxon'))
		@if(Session::get('taxon') != -1)
			<div id="dialog-success" title="Search Result">
				<p>			    
			    	<?php $taxon = Session::get('taxon'); ?>
			    	<script type="text/javascript">
			    		var taxon = <?php echo json_encode(Session::get('taxon')); ?>;
			    	</script>

			    	@foreach($taxon as $key => $value)
			    		<strong> {{ ucwords($key) }}: </strong> {{ $value }} <br .>
			    	@endforeach
				</p>
			</div>
		@else
			<div id="dialog-fail" title="Search Result">
				<p>			    
			    	{{ "No results found. Please try again." }}
				</p>
			</div>
		@endif
	@endif
@stop