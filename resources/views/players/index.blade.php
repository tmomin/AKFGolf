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
                        <th>Waiver</th>
                        <th>Team</th>
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
                            <td>{{ $player->company['companyName'] }}</td>
                            <td>{{ $player->email }}</td>
                            <td>{{ $player->phone }}</td>
                            {{--<td>{{ $player->signature['sig_hash'] }}</td>--}}
                            <td>
                                @if($player->signature['sig_hash'] === null)
                                    <input type="checkbox" disabled>
                                @else
                                    <input type="checkbox" disabled checked>
                                @endif
                            </td>
                            <td>@if($player->teamId == null) @else <a href="{{ URL::to('teams', $player->team['id']) }}">{{ $player->team['name'] }}</a> @endif</td>
                            <td><a class="btn btn-info" href="{{ route('players.edit', $player->id) }}">Edit</a></td>
                            {{--<td>--}}
                                {{--<form action="{{ URL::route('players.destroy',$player['id']) }}" method="POST">--}}
                                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                    {{--<button class="btn btn-danger" onclick="$(this).find('form').submit();">Delete</button>--}}
                                {{--</form>--}}
                            {{--</td>--}}
                            <td>
                                <form action="{{ URL::route('players.checkin',$player['id']) }}" method="POST">
                                @if($player->signature['sig_hash'] === null)
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-primary" onclick="$(this).find('form').submit();" disabled="disabled">Checkin</button>
                                @else
                                    @if($player->checkin == true)
                                        <button class="btn btn-primary" disabled="disabled">Checked-In</button>
                                    @else
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-primary" onclick="$(this).find('form').submit();">Checkin</button>
                                    @endif
                                @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @include('partials.addplayer')
        </div>
    </div> <!-- /container -->

@endsection