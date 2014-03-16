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
					<div class="col-sm-3 col-md-4">
						Hello, {{ Auth::user()->username }}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5 col-sm-offset-3 col-md-6 col-md-offset-2 main">
						@section('AssemblyLinePart')
							<h1 class="page-header"> Search for a Taxon </h1>
						@show

						@section('body')
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
	</body>
</html>