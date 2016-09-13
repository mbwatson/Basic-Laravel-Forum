@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        	Channels
        </div>
        <div class="panel-heading">
        	<table width="100%">
	        	@foreach ($channels as $channel)
	        		<tr>
	        			<td>
		        			{{ $channel->title }} - 
		        			<a href="#">Edit</a> - 
	        				<a href="#">Delete</a>
	        			</td>
	        		</tr>
	        		<tr>
	        			<td colspan="3">
		        			{{ $channel->description }}<br><br>
	        			</td>
	        		</tr>
	        	@endforeach
        	</table>
        </div>
    </div>
</div>
@endsection
