@extends('layouts.app')

@section('title', 'List Players')

@section('content')

    <div class="container theme-showcase" role="main">
        <div class="has-error">
            @if(Session::has('flash_message'))
                <div class="alert alert-danger"><em> {{ session('flash_message') }}</em></div>
            @endif
        </div>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Welcome to AKF Golf 2017</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <div class="row">
            <div class="col-md-0 col-md-offset-0">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        {{--<th>#</th>--}}
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{--<th>Waiver</th>--}}
                        {{--<th>Team</th>--}}
                        <th></th>
                        {{--<th></th>--}}
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players as $player)
                        <tr>
                            {{--<td>{{ $company->id }}</td>--}}
                            <td>{{ $player->firstName }}</td>
                            <td>{{ $player->lastName }}</td>
                            <td><a href="{{ URL::to('companies', $player->company['id']) }}">{{ $player->company['companyName'] }}</a></td>
                            <td>{{ $player->email }}</td>
                            <td>{{ $player->phone }}</td>
                            {{--<td>{{ $player->signature['sig_hash'] }}</td>--}}
                            {{--<td>--}}
                                {{--@if($player->signature['sig_hash'] === null)--}}
                                    {{--<input type="checkbox" disabled>--}}
                                {{--@else--}}
                                    {{--<input type="checkbox" disabled checked>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>@if($player->teamId == null) @else <a href="{{ URL::to('teams', $player->team['id']) }}">{{ $player->team['name'] }}</a> @endif</td>--}}
                            <td><a class="btn btn-info" href="{{ route('players.edit', $player->id) }}">Edit</a></td>
                            {{--<td>--}}
                            {{--<form action="{{ URL::route('players.destroy',$player['id']) }}" method="POST">--}}
                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            {{--<button class="btn btn-danger" onclick="$(this).find('form').submit();">Delete</button>--}}
                            {{--</form>--}}
                            {{--</td>--}}
                            <td>
                                <form action="{{ URL::route('awards.checkin',$player['id']) }}" method="POST">
                                    @if($player->award['checkin'] === null)
                                        <a href="{{ URL::to('awards/checkin/' . $player['id']) }}" class="btn btn-primary">Checkin</a>
                                    @else
                                        <a href="{{ URL::to('awards/checkin/' . $player['id']) }}" class="btn btn-primary" disabled>Checkin</a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--@include('partials.addplayer')--}}
            <div class="row col-md-10 col-md-offset-0">
                <form class="form-inline" method="post" action="{{ url('/players') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="sr-only" for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="companyId">Company</label>
                        <select class="form-control" id="companyId" name="companyId" required>
                            <option value="" disabled selected>Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Player</button>
                </form>
            </div>
        </div>
    </div> <!-- /container -->

@endsection