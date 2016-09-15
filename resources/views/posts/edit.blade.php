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
    </div>
</div>
@endsection
