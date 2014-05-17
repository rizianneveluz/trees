@extends('layouts.master')

@section('cssDeclarations')
	@parent
		{{ HTML::style('css/custom.css') }}
@stop

@section('body')
	<div class="row">

		<div class="btn-group btn-group-justified">
			<div class="btn-group">
				<button type="button" class="btn btn-default" id="chooseFromList">Choose from a List</button>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-default" id="useSearchForm">Use a Search Form</button>
			</div>
		</div>

		<br />

		<div id="searchList" class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Scientific Name</th>
						<th>Common Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Adenium obesum</td>
						<td>Desert Rose</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Adenium obesum" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}
						</td>
					</tr>
					<tr>
						<td>Adiantum raddianum</td>
						<td>Delta maidenhair</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Adiantum raddianum" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Alpinia purpurata</td>
						<td>Red ginger</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Alpinia purpurata" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Alpinia vittata</td>
						<td>White-striped ginger</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Alpinia vittata" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Atriplex halimus</td>
						<td>Silver dust</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Atriplex halimus" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Beaumontia grandiflora</td>
						<td>Easter lily vine</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Beaumontia grandiflora" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Catharanthus roseus</td>
						<td>Chichirica</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Catharanthus roseus" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Dalea pulchra</td>
						<td>Bush Dalea</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Dalea pulchra" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Ephedra nevadensis</td>
						<td>Desert Tea</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Ephedra nevadensis" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Hedychium coronarium</td>
						<td>Kamia</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Hedychium coronarium" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Impatiens walleriana</td>
						<td>Busy Lizzies</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Impatiens walleriana" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Licuala grandis</td>
						<td>Ruffled fan palm</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Licuala grandis" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Magnolia coco</td>
						<td>Chinese magnolia</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Magnolia coco" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Ophiopogon japonicus</td>
						<td>Black grass</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Ophiopogon japonicus" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Pentas lanceolata</td>
						<td>Star cluster</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Pentas lanceolata" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Solandra grandiflora</td>
						<td>Cup of gold</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Solandra grandiflora" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Spathoglottis plicata</td>
						<td>Philippine Ground Orchid</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Spathoglottis plicata" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Tacca chantrieri</td>
						<td>Bat plant</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Tacca chantrieri" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Wrightia religiosa</td>
						<td>Sui mei</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Wrightia religiosa" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
					<tr>
						<td>Zea Mays</td>
						<td>Corn</td>
						<td>
							{{ Form::open(array('url' => 'taxon')) }}
								<input type="hidden" value="Zea Mays" name="taxon" id="taxon">
								<input type="submit" name="submit" value="Add">
							{{ Form::close() }}	
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		{{ Form::open(array('id' => 'searchForm searchForm2', 'url' => 'taxon')) }}
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