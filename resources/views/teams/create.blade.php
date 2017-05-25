@extends('layouts.app')

@section('title', 'Add A New Team')

@section('content')

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Add a new team</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <div class="row col-md-12 col-md-offset-1">
            <form class="form-inline" method="post" action="{{ url('/teams') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="startingHole"># of Golf Players</label>
                    <input type="text" class="form-control" id="startingHole" name="startingHole" placeholder="Starting Hole">
                </div>
                <button type="submit" class="btn btn-primary">Add Team</button>
            </form>
        </div>

    </div> <!-- /container -->

@endsection