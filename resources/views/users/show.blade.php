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
                        {{ $user->name }} {{ $user->admin ? '&#128219;' : '' }}
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

        <h5>Recent Activity</h5>
        
        <div class="posts">
            <div class="panel panel-default">
                <div class="panel-body"> 
                    @if (count($user->activities()) > 0)
                        @foreach ($user->activities(10) as $activity)
                            <div style="padding: 10px;">
                                @if (preg_match('/Post/', get_class($activity)))
                                    {{ $activity->created_at->toFormattedDateString() }}
                                    - Posted <a href="{{ route('posts.show', $activity) }}">{{ $activity->title }}</a><br>
                                @elseif (preg_match('/Comment/', get_class($activity)))
                                    {{ $activity->created_at->toFormattedDateString() }}
                                    - Commented on the post <a href="{{ route('posts.show', $activity->post) }}">{{ $activity->post->title }}</a><br>
                                @endif
                            </div>
                        @endforeach
                    @else
                        No recent activity... <i>yet</i>!
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
