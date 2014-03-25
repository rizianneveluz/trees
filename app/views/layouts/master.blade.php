<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="An integrated system for building phylogenetic trees">
		<meta name="author" content="Veluz, Rizianne">
		<title>
			@section('title')
				Phylogenetic Trees
			@show
		</title>

		<!-- CSS are placed here -->
		@section('cssDeclarations')
			{{ HTML::style('css/bootstrap.css') }}
			{{ HTML::style('css/bootstrap-responsive.css') }}
			{{ HTML::style('css/dashboard.css') }}
			{{ HTML::style('css/jquery-ui-1.10.4.custom.min.css') }}
			{{ HTML::style('css/rightSidebar.css') }}
		@show

	</head>

	<body>
		@section('navbar')
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="{{ URL::to('') }}"> Laravel </a>
					</div>

					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{ URL::to('logout') }}"> Log Out </a></li>
						</ul>
					</div>
				</div>
			</div>
		@show

		@section('sidebar')
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2 sidebar">
						<ul class="nav nav-sidebar">
							<li><a> Hello, {{ Auth::user()->username }}! </a></li>
							<li><a> Chosen sequences: <span class="badge" id="popover" data-placement="bottom" data-content="Sequence added!">{{ Session::get('sequences_num') }}</span> </a></li>
							@section('testing_area')
								<li><a href="{{ URL::to('truncate') }}"> Truncate </a></li>
							@show
						</ul>
					</div>
					<div class="col-md-6 col-md-offset-3">
						<ol class="breadcrumb">
							@section('breadcrumb')
								<li class="active"><a href="{{ URL::to('/') }}">Search</a></li>
								<li><a href="{{ URL::to('align') }}">Align</a></li>
								<li><a href="{{ URL::to('analyze') }}">Analyze</a></li>
							@show
						</ol>
						@section('assemblyLinePart')
							<h1 class="page-header"> Search for a Taxon </h1>
						@show

						@section('body')

						@show
					</div>
					<div class="col-md-3" id="rightSidebar">
						@section('jobResult')
						@show
					</div>
				</div>
			</div>
		@show

		<!-- Scripts are placed here -->
		@section('scriptDeclarations')
			{{ HTML::script('js/jquery-1.11.0.js') }}
			{{ HTML::script('js/bootstrap.min.js') }}
			{{ HTML::script('js/jquery-ui-1.10.4.custom.min.js') }}
			{{ HTML::script('js/masterScript.js') }}
		@show
		
		@section('scripts')
		@show
	</body>
</html>