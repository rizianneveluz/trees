@extends('layouts.master')

@section('treeScript')

	<?php
		if (Session::has('job_data')) {
			$job_data = Session::get('job_data');
			if (isset($job_data['tree']) && ($job_data['tree'] != '--')) {
				$tree = str_replace("\n", "\\n", $job_data['tree']);
			}
		}
	?>

	<script type="text/javascript">
		window.onload = function() {
			var dataObject = { newick: '(GBMLG16834-13|Fiona:0.15227,CYTC5670-12|Zea:0.20183,GBSP0601-06|Urechis:0.15460);' };
			phylocanvas = new Smits.PhyloCanvas(
			    dataObject,
			    'svgCanvas',
			    500, 500
			);
	    };
	</script>
@stop

@section('breadcrumb')
	<li><a href="{{ URL::to('/') }}">Search</a></li>
	<li><a href="{{ URL::to('align') }}">Align</a></li>
	<li><a href="{{ URL::to('analyze') }}">Analyze</a></li>
	<li class="active"><a href="{{ URL::to('draw') }}">Draw</a></li>
@stop

@section('assemblyLinePart')
	<h1 class="page-header"> Phylogenetic Tree </h1>
@stop

@section('body')
	
	<div id="svgCanvas">
		
	</div>
@stop