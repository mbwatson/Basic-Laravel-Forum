@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Profile
        </div>

        <div class="panel-body">
        	<table width="100%">
        		<tr>
        			<td class="user-info">
                        <img src="{{ Gravatar::get(Auth::user()->email, ['size' => 120]) }}" class="avatar">
        			</td>
        			<td style="width:100%;" class="body">
			        	{{ Form::model(Auth::user(), ['route' => 'account.update', 'method' => 'PATCH']) }}
                            <div class="form-group form-inline">
                                {{ Form::label('name', 'Username:', ['class' => 'control-label']) }}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group form-inline">
                                {{ Form::label('first_name', 'First Name:', ['class' => 'control-label']) }}
                                {{ Form::text('first_name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group form-inline">
                                {{ Form::label('last_name', 'Last Name:', ['class' => 'control-label']) }}
                                {{ Form::text('last_name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group form-inline">
                                {{ Form::label('location', 'Location:', ['class' => 'control-label']) }}
                                {{ Form::text('location', null, ['class' => 'form-control']) }}
                            </div>
    			        	<div class="form-group form-inline">
    			        		{{ Form::label('email', 'Email:') }}
    						    {{ Form::text('email', null, ['class' => 'form-control']) }}
    						</div>
    						<div class="form-group text-right">
    						    {{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
    						</div>
						{{ Form::close() }}
        			</td>
        		</tr>
        	</table>
        </div>
    </div>
</div>
@endsection
