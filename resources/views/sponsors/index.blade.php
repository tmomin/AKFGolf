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
                        <th>Number of Players</th>
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
                            <td>{{ $sponsor->numOfPlayers }}</td>
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
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>