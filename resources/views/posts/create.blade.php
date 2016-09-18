@extends('layouts.master')

@section('breadcrumbs', Breadcrumbs::render('posts.create'))

@section('content')
	<div class="col-xs-12">
	    <div class="panel panel-default">
	        <div class="panel-heading">Create Post</div>

	        <div class="panel-body">
	            {!! Form::open(['route' => 'posts.store']) !!}
	                @include('partials.forms.post')
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>
@endsection
