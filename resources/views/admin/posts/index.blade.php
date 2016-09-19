@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        	Posts
        </div>
        <div class="panel-heading">
        	@foreach ($posts as $post)
                <table width="100%" class="post">
                    <tr>
                        <td class="user-info hidden-xs" style="padding: 5px">
                            <a href="{{ route('users.show', $post->user) }}"><img src="{{ Gravatar::get($post->user->email, ['size' => 32]) }}" class="avatar"></a>
                        </td>
                        <td width="70%">
                            <div class="title">
                                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a><br>
                            </div>
                        </td>
                        <td class="channel" style="min-width: 100px;">
                            {!! $post->channel->colorBlock() !!}
                            <a href="{{ route('posts.channel', $post->channel) }}">{{ $post->channel->title }}</a>
                        </td>
                        <td class="text-center" style="min-width: 50px;">
                            {{ $post->comments->count() }}
                        </td>
                    </tr>
                </div>
        	@endforeach
        </div>
    </div>
</div>
@endsection
