@extends('layouts.app')

@section('title', 'Edit Team')

@section('content')

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Add a new team</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <form class="form-inline" action="{{ URL::route('teams.update',$team['id']) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="{{ $team->id }}">
                <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="{{ $team->name }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="startingHole"># of Golf Players</label>
                    <input type="text" class="form-control" id="startingHole" name="startingHole" placeholder="Starting Hole" value="{{ $team->startingHole }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit Team</button>
            </form>
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>