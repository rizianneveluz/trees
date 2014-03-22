@extends('layouts.master')

@section('breadcrumb')
	<li><a href="{{ URL::to('/') }}">Search</a></li>
	<li class="active"><a href="{{ URL::to('align') }}">Align</a></li>
@stop

@section('assemblyLinePart')
	<h1 class="page-header"> Multiple Sequence Alignment </h1>
@stop

@section('body')
	
	

@stop