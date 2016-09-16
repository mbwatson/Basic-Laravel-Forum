@extends('layouts.master')

@section('content')
	<div class="col-xs-12">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	        	<a href="{{ route('admin.channels.index') }}">Channels</a>
	        </div>
	    </div>
	</div>

	<div class="col-xs-12">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	        	<a href="{{ route('admin.posts.index') }}">Posts</a>
	        </div>
	    </div>
	</div>
@endsection
