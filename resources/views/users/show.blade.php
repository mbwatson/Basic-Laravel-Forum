@extends('layouts.master')

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
                        First Name: {{ $user->first_name }} <br>
                        Last Name: {{ $user->last_name }} <br>
                        Location: {{ $user->location }} <br>
                        Email: {{ $user->email }} <br>
                        <hr>
                        @if (count($user->posts) > 0)
                            <h4>{{ $user->posts->count() }} Posts</h4>
                            @foreach ($user->posts as $post)
                                {{ $post->created_at->toFormattedDateString() }} - <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a><br>
                            @endforeach
                        @else
                            No Posts!
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
