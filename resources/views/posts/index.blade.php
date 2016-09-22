@extends('layouts.master')

@section('title', 'Posts')

@section('breadcrumbs')
    @if ( isset($channel) )
        {!! Breadcrumbs::render('posts.channel', $channel) !!}
    @else
        @if ( isset($filters['group']) )
            {!! Breadcrumbs::render('posts.favorites') !!}
        @else
            {!! Breadcrumbs::render('posts.all') !!}
        @endif
    @endif
@endsection

@section('content')
    <div class="hidden-xs col-sm-2 text-center">
        <a class="btn btn-block btn-primary" href="{{ route('posts.create') }}">New Post</a>
        
        <h4>Channels</h4>
        @if (Request::is('posts/channels/*'))
            <a class="btn btn-block btn-default" href="{{ route('posts.index') }}">Everything</a>
        @else
            <a class="btn btn-block btn-info" href="{{ route('posts.index') }}">Everything</a>
        @endif
        @foreach ($channels as $channel)
            @if (Request::is('posts/channels/'.$channel->slug))
                <a class="btn btn-block btn-default btn-channel channel-active" style="border-color: {{ $channel->color }};" ref="{{ route('posts.channel', $channel) }}">
                    {{ $channel->title }}
                </a>
            @else
                <a class="btn btn-block btn-default btn-channel channel-inactive" style="border-color: {{ $channel->color }};" href="{{ route('posts.channel', $channel) }}">
                    {{ $channel->title }}
                </a>
            @endif
        @endforeach

        <h4>Filters</h4>
        @if (isset($filters['group']) && $filters['group'] == 'my_favorites')
            <a class="btn btn-block btn-default btn-filter filter-active" href="{{ route('posts.index') }}">My Favorites</a>
        @else
            <a class="btn btn-block btn-default btn-filter filter-inactive" href="{{ route('posts.index', ['group' => 'my_favorites']) }}">My Favorites</a>
        @endif
        @if (isset($filters['group']) && $filters['group'] == 'popular')
            <a class="btn btn-block btn-default btn-filter filter-active" href="{{ route('posts.index') }}">Popular</a>
        @else
            <a class="btn btn-block btn-default btn-filter filter-inactive" href="{{ route('posts.index', ['group' => 'popular']) }}">Popular</a>
        @endif
        @if (isset($filters['group']) && $filters['group'] == 'trending')
            <a class="btn btn-block btn-default btn-filter filter-active" href="{{ route('posts.index') }}">Trending</a>
        @else
            <a class="btn btn-block btn-default btn-filter filter-inactive" href="{{ route('posts.index', ['group' => 'trending']) }}">Trending</a>
        @endif

    </div>
    <div class="col-xs-12 col-sm-10 posts">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="panel panel-default post">
                    @include('partials.post', ['post' => $post])
                </div>
            @endforeach

            <center>{{ $posts->links() }}</center>
        @else
            No Posts
        @endif
    </div>
@endsection
