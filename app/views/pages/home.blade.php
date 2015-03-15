@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to hypebook</h1>

        <p>Welcome to the hypest spot in ATX to find people the hypest people around the city</p>

        @if(!$currentUser)
            <p>
                {{ link_to_route('register_path', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary']) }}
            </p>
        @endif()
    </div>
@stop

