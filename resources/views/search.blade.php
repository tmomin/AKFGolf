@extends('layouts.app')

@section('title', 'Search')

@section('content')

<div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Welcome to AKF Golf 2017</h1>
        <p>This site is to be used to check players on the day of the tournament.</p>

        <div class="form-group">
            <form class="form-horizontal" method="get" action="{{ url('/') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="search">Search by players name</label>
                <input class="form-control" type="search" id="search" name="search"><br>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    @if($results)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        {{--<th>#</th>--}}
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Waiver Signed</th>
                        <th>Team</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            {{--<td>{{ $company->id }}</td>--}}
                            <td>{{ $result->firstName }}</td>
                            <td>{{ $result->lastName }}</td>
                            <td>{{ $result->company->companyName }}</td>
                            <td>{{ $result->email }}</td>
                            <td>{{ $result->waiverSign }}</td>
                            <td>@if($result->teamId == null) @else {{ $result->team->name }} @endif</td>
                            <td><a class="btn btn-info" href="{{ route('players.edit', $result->id) }}">Edit</a></td>
                            <td>
                                <form action="{{ URL::route('players.destroy',$result['id']) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger" onclick="$(this).find('form').submit();">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ URL::route('players.checkin',$result['id']) }}" method="POST">
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-primary" onclick="$(this).find('form').submit();">Checkin</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


</div> <!-- /container -->

@endsection