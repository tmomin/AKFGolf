@extends('layouts.app')

@section('title', 'Edit')

@section('content')

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h2>Add additional sponsorship levels</h2>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <div class="row col-md-12 col-md-offset-1">
            <form class="form-inline" action="{{ URL::route('sponsors.update',$sponsor['id']) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="{{ $sponsor->id }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $sponsor->name }}">
                </div>
                <div class="form-group">
                    <label for="dollarAmount">Dollar Amount</label>
                    <input type="text" class="form-control" id="dollarAmount" name="dollarAmount" value="{{ $sponsor->dollarAmount }}">
                </div>
                <div class="form-group">
                    <label for="numberOfPlayers">Number of Players</label>
                    <input type="text" class="form-control" id="numberOfPlayers" name="numOfPlayers" value="{{ $sponsor->numOfPlayers }}">
                </div>
                <button type="submit" class="btn btn-default">Edit</button>
            </form>
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>