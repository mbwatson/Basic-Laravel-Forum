@extends('layouts.master')

@section('title', 'Posts')

@section('content')
    <div class="col-xs-2 text-center">
        <a class="btn btn-block btn-primary" href="{{ route('posts.create') }}">Create New Post</a>
        <h4>Channels</h4>
        @if (Request::is('posts/channels/*'))
            <a class="btn btn-block btn-default" href="{{ route('posts.index') }}">Everything</a>
        @else
            <a class="btn btn-block btn-info" href="{{ route('posts.index') }}">Everything</a>
        @endif
        @foreach ($channels as $channel)
            @if (Request::is('posts/channels/'.$channel->slug))
                <a class="btn btn-block btn-info" href="{{ route('posts.channel', $channel) }}">{{ $channel->title }}</a>
            @else
                <a class="btn btn-block btn-default" href="{{ route('posts.channel', $channel) }}">{{ $channel->title }}</a>
            @endif
        @endforeach
    </div>
    <div class="col-xs-10 posts">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="panel panel-default post">
                    <table width="100%">
                        <tr>
                            <td class="user-info" width="1%">
                                <a href="{{ route('users.show', $post->user) }}"><img src="{{ Gravatar::get($post->user->email, ['size' => 64]) }}" class="avatar"></a>
                            </td>
                            <td width="80%">
                                <div class="title">
                                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a><br>
                                </div>
                                <div class="meta">
                                    Posted: {{ $post->created_at->diffForHumans() }} by <a href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a><br>
                                    Last Activity: {{ $post->updated_at->diffForHumans() }}
                                </div>
                            </td>
                            <td class="channel" width="10%">
                                <a href="{{ route('posts.channel', $post->channel) }}">{{ $post->channel->title }}</a>
                            </td>
                            <td class="meta text-center" width="10%">
                                {{ $post->comments->count() }}
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach

            <center>{{ $posts->links() }}</center>
        @else
            No Posts
        @endif
    </div>
@endsection
