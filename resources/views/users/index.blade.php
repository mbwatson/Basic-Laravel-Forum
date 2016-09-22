@extends('layouts.master')

@section('breadcrumbs', Breadcrumbs::render('users.index'))

@section('content')
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Users
            </div>

            <div class="panel-body">
                @foreach ($users as $user)
                    <a href="{{ route('users.show', $user) }}"><img src="{{ Gravatar::get($user->email, ['size' => 30]) }}" class="avatar"> {{ $user->name }}</a>
                    {{ $user->admin ? '&#128219;' : '' }}
                    <br><br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
