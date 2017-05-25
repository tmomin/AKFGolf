@extends('layouts.app')

@section('title', 'List Players for Company')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="has-error">
            @if(Session::has('flash_message'))
                <div class="alert alert-danger"><em> {{ session('flash_message') }}</em></div>
            @endif
        </div>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Team {{ $player->team->name }}</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players as $player)
                        <tr>
                            {{--<td>{{ $company->id }}</td>--}}
                            <td>{{ $player->firstName }}</td>
                            <td>{{ $player->lastName }}</td>
                            <td>{{ $player->company->companyName }}</td>
                            <td>{{ $player->email }}</td>
                            <td>{{ $player->waiverSign }}</td>
                            <td>@if($player->teamId == null) @else {{ $player->team->name }} @endif</td>
                            <td><a href="{{ route('players.edit', $player->id) }}">Edit</a></td>
                            {{--<td><a href="{{ url('/sponsors', [$company->id]) }}">Edit</a></td>--}}
                            {{--<td><a href="{{ url('/sponsors', [$company->id]) }}" data-method="DELETE" data-confirm="Are you sure?" data-token="{{csrf_token()}}>Delete</a></td>--}}
                            <td>
                                <a data-method="delete" style="cursor:pointer;" onclick="$(this).find('form').submit();">Delete
                                    <form action="{{ URL::route('players.destroy',$player['id']) }}" method="POST">
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
            <div class="row col-md-11 col-md-offset-2">
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
                            @foreach($companies as $company)
                                @if($company->id == $id)
                                    <option selected value="{{ $company->id }}">{{ $company->companyName }}</option>
                                @else
                                    <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="teamid">Team</label>
                        <select class="form-control" id="teamId" name="teamId">
                            <option></option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Player</button>
                </form>
            </div>
        </div>

    </div> <!-- /container -->

@endsection