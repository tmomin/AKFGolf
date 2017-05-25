@extends('layouts.app')

@section('title', 'Search')

@section('content')

<div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>{{ $player->firstName . " " . $player->lastName }} has been successfully checked in.</h1>
        <p>Team: {{ $player->team['name'] }}</p>
        <p>Starting Hole: {{ $player->team['startingHole'] }}</p>
    </div>

</div> <!-- /container -->

@endsection