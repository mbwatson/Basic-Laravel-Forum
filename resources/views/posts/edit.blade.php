@extends('layouts.master')

@section('breadcrumbs', Breadcrumbs::render('posts.edit', $post))

@section('content')
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Post</div>

        <div class="panel-body">
            {!! Form::model($post, [ 'method' => 'PATCH', 'route' => ['posts.update', $post] ]) !!}
                @include('partials.forms.post')
            {!! Form::close() !!}
        </div>

        <div class="panel-footer text-right">
        	<!-- Delete -->
            {!! Form::open(['route' => ['posts.destroy', $post], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-link" title="Delete Post" data-toggle="tooltip" data-placement="bottom" style="padding: 0;">Delete</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
