@extends('layouts.master')

@section('treeScript')

	<?php
		if (Session::has('job_data')) {
			$job_data = Session::get('job_data');
			if (isset($job_data['tree']) && ($job_data['tree'] != '--')) {
				$tree = $job_data['tree'];
			}
			else $tree = '';
		}
	?>

	<script type="text/javascript">
		window.onload = function() {
			var dataObject = { newick: '<?php echo $tree; ?>'};
			phylocanvas = new Smits.PhyloCanvas(
			    dataObject,
			    'svgCanvas',
			    500, 500
			);

			var svgSource = phylocanvas.getSvgSource();
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
	<h1 class="page-header text-center"> Phylogenetic Tree </h1>
@stop

@section('body')
	
	<div id="svgCanvas">
		
	</div>
@stop