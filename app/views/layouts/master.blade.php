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
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only"> Toggle Navigation </span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="{{ URL::to('') }}"> Laravel </a>
					</div>

					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#"> Home </a></li>
							<li><a href="#"> Settings </a></li>
							<li><a href="#"> Help </a></li>
						</ul>
						<form class="navbar-form navbar-right">
							<input type="text" class="form-control" placeholder="Search">
						</form>
					</div>
				</div>
			</div>
		@show

		@section('sidebar')
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3 col-md-2 sidebar">
						<ul class="nav nav-sidebar">
							<li class="active"><a href="#"> Search Sequence </a></li>
							<li><a href="{{url('align')}}"> Align </a></li>
							<li><a href="#"> Analyze </a></li>
							<li><a href="#"> Tree View </a></li>
						</ul>
					</div>
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						@section('AssemblyLinePart')
							<h1 class="page-header"> Dashboard </h1>
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