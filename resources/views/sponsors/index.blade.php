@extends('layouts.app')

@section('title', 'List Sponsors')

@section('content')
    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Welcome to AKF Golf 2017</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        {{--<th>#</th>--}}
                        <th>Name</th>
                        <th>Dollar Amount</th>
                        <th># of Golf Players</th>
                        <th># of Award Tickets</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sponsors as $sponsor)
                        <tr>
                            {{--<td>{{ $sponsor->id }}</td>--}}
                            <td>{{ $sponsor->name }}</td>
                            <td>${{ $sponsor->dollarAmount }}</td>
                            <td>{{ $sponsor->numOfGolfPlayers }}</td>
                            <td>{{ $sponsor->numOfAwardTickets }}</td>
                            <td><a href="{{ route('sponsors.edit', $sponsor->id) }}">Edit</a></td>
                            {{--<td><a href="{{ url('/sponsors', [$sponsor->id]) }}">Edit</a></td>--}}
                            {{--<td><a href="{{ url('/sponsors', [$sponsor->id]) }}" data-method="DELETE" data-confirm="Are you sure?" data-token="{{csrf_token()}}>Delete</a></td>--}}
                            <td>
                                <a data-method="delete" style="cursor:pointer;" onclick="$(this).find('form').submit();">Delete
                                    <form action="{{ URL::route('sponsors.destroy',$sponsor['id']) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row col-md-12 col-md-offset-1">
                <form class="form-inline" method="post" action="{{ url('/sponsors') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="sr-only" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="dollarAmount">$ Amount</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" id="dollarAmount" name="dollarAmount" placeholder="Amount" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="numberOfGolfPlayers"># of Golf Players</label>
                        <input type="text" class="form-control" id="numberOfGolfPlayers" name="numOfGolfPlayers" placeholder="Number of Golf Players" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="numOfAwardTickets"># of Award Tickets</label>
                        <input type="text" class="form-control" id="numOfAwardTickets" name="numOfAwardTickets" placeholder="Number of Award Tickets" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Sponsorship</button>
                </form>
            </div>
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>