@extends('layouts.app')

@section('title', 'Edit Sponsorship Level')

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
                    <label class="sr-only" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="{{ $sponsor->name }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="dollarAmount">$ Amount</label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="text" class="form-control" id="dollarAmount" name="dollarAmount" placeholder="Dollar Amount" required value="{{ $sponsor->dollarAmount }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="numberOfGolfPlayers"># of Golf Players</label>
                    <input type="text" class="form-control" id="numberOfGolfPlayers" name="numOfGolfPlayers" placeholder="Number of Golf Players" required value="{{ $sponsor->numOfGolfPlayers }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="numOfAwardTickets"># of Award Tickets</label>
                    <input type="text" class="form-control" id="numOfAwardTickets" name="numOfAwardTickets" placeholder="Number of Award Tickets" required value="{{ $sponsor->numOfAwardTickets }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit Sponsorship</button>
            </form>
        </div>

    </div> <!-- /container -->

@endsection