@extends('layouts.master')

@section('breadcrumbs', Breadcrumbs::render('users.show', $user))

@section('content')
    <div class="col-xs-12">
        <div class="panel panel-default">
            <table class="user">
                <tr>
                    <td class="user-info" rowspan="2">
                        <img src="{{ Gravatar::get($user->email, ['size' => 120]) }}" class="avatar">
                    </td>
                    <td class="title" colspan="2">
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <td class="body">
                        Name: {{ $user->full_name }} <br>
                        Location: {{ $user->location }} <br>
                        Email: {{ $user->email }} <br>
                        <hr>
                        <h3>Favorites</h3>
                        @if (count($user->favorites) > 0)
                            <h4>{{ $user->favorites->count() }} Favorite Posts</h4>
                            @foreach ($user->favorites as $post)
                                {{ $post->created_at->toFormattedDateString() }}
                                 - <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a><br>
                            @endforeach
                        @else
                            No Posts!
                        @endif
                        <hr>
                        <h3>Participation</h3>
                        @if (count($user->posts) > 0)
                            <h4>{{ $user->posts->count() }} Posts</h4>
                            @foreach ($user->posts as $post)
                                {{ $post->created_at->toFormattedDateString() }}
                                 - <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a><br>
                            @endforeach
                        @else
                            No Posts!
                        @endif
                        <hr>
                        @if (count($user->comments) > 0)
                            <h4>{{ $user->comments->count() }} Comments</h4>
                            @foreach ($user->comments as $comment)
                                {{ $comment->created_at->toFormattedDateString() }}
                                 - Commented on <a href="{{ route('posts.show', $comment->post) }}">{{ $comment->post->title }}</a><br>
                            @endforeach
                        @else
                            No Comments!
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
