@extends('layouts.master')

@section('content')
@if (!Request::has('page'))
    <article class="post">
        <div class="panel panel-default">
            <table>
                <tr>
                    <td class="title" colspan="2">
                        {{ $post->title }}
                    </td>
                </tr>
                <tr>
                    <td class="user-info" rowspan="3">
                        <a href="{{ route('users.show', $post->user) }}"><img src="{{ Gravatar::get($post->user->email) }}" class="avatar"></a>
                    </td>
                </tr>
                <tr>
                    <td class="body">
                        <p>
                            <a href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a>
                            - {{ $post->created_at->diffForHumans() }}
                        </p>
                        {!! nl2br(e($post->body)) !!}
                    </td>
                </tr>
            </table>
            <div class="panel-footer">
                <span>
                    <a href="#">Like</a>
                </span>
                <span class="pull-right">
                    @if ( $post->user == Auth::user() || Auth::user()->admin )
                        <a href="{{ route('posts.edit', $post) }}">Edit</a>
                    @endif
                </span>
            </div>
        </div>
    </article>
@endif

<div class="comments">
    <h3>Comments</h3>
    @foreach ($comments as $comment)
        <div class="panel panel-default post">
            <table>
                <tr>
                    <td class="user-info">
                        <a href="{{ route('users.show', $comment->user) }}"><img src="{{ Gravatar::get($comment->user->email) }}" class="avatar"></a>                        
                    </td>
                    <td class="body">
                        <p>
                            <a href="{{ route('users.show', $post->user) }}">{{ $comment->user->name }}</a>
                            - {{ $comment->created_at->diffForHumans() }}
                        </p>
                        {!! nl2br(e($comment->body)) !!}
                    </td>
                </tr>
            </table>
            <div class="panel-footer">
                <a href="#">Like</a>
            </div>
        </div>
    @endforeach
</div>

@if ($post->comments->count() > config('global.perPage'))
    <center>{{ $comments->links() }}</center>
@endif

<div class="row">
    <div class="col-xs-12">
        {!! Form::open(['route' => 'comments.store']) !!}
            @include('partials.forms.comment')
        {!! Form::close() !!}
    </div>
</div>

@endsection
