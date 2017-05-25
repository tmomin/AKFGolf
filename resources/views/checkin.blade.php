@extends('layouts.app')

@section('title', 'Search')

@section('content')

<div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>{{ $player.firstName . " " . $player->lastName }} has been successfully checked in.</h1>
        <p>Team: {{ $player->team['name'] }}</p>
        <p>Starting Hole: {{ $player->team['startingHole'] }}</p>

        <div class="form-group">
            <form class="form-horizontal" method="get" action="{{ url('/') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="search">Search by players name</label>
                <input class="form-control" type="search" id="search" name="search"><br>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

</div> <!-- /container -->

@endsection