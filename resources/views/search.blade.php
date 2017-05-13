@extends('layouts.app')

@section('title', 'Search')

@section('content')

<div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Welcome to AKF Golf 2017</h1>
        <p>This site is to be used to check players on the of the tournament.</p>

        <div class="form-group">
            <form class="form-horizontal" method="post" action="{{ url('/checkin') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="search">Search by players name</label>
                <input class="form-control" type="text" id="search"><br>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

</div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>