@extends('layouts.app')

@section('title', 'Add New Player')

@section('content')

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Add New Player</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        @include('partials.addplayer')

    </div> <!-- /container -->

@endsection