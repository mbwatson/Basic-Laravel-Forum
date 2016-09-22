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
                    </td>
                </tr>
            </table>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Favorites</div>
            <div class="panel-body">
                @if (count($user->favorites) > 0)
                    @foreach ($user->favorites as $post)
                        {{ $post->created_at->toFormattedDateString() }}
                         - <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a><br>
                    @endforeach
                @else
                    No Posts!
                @endif
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Participation</div>
            <div class="panel-body">
                @if (count($user->activities()) > 0)
                    @foreach ($user->activities() as $activity)
                        @if (preg_match('/Post/', get_class($activity)))
                            {{ $activity->created_at->toFormattedDateString() }}
                            - Posted <a href="{{ route('posts.show', $activity) }}">{{ $activity->title }}</a><br>
                        @elseif (preg_match('/Comment/', get_class($activity)))
                            {{ $activity->created_at->toFormattedDateString() }}
                            - Commented on the post <a href="{{ route('posts.show', $activity->post) }}">{{ $activity->post->title }}</a><br>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection
