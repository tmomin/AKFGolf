@extends('layouts.app')

@section('title', 'List Teams')

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
                        <th>Starting Hole</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            {{--<td>{{ $sponsor->id }}</td>--}}
                            <td><a href="{{ URL::to('teams', $team->id) }}">{{ $team->name }}</a></td>
                            <td>{{ $team->startingHole }}</td>
                            <td><a href="{{ route('teams.edit', $team->id) }}">Edit</a></td>
                            {{--<td><a href="{{ url('/sponsors', [$sponsor->id]) }}">Edit</a></td>--}}
                            {{--<td><a href="{{ url('/sponsors', [$sponsor->id]) }}" data-method="DELETE" data-confirm="Are you sure?" data-token="{{csrf_token()}}>Delete</a></td>--}}
                            <td>
                                <a data-method="delete" style="cursor:pointer;" onclick="$(this).find('form').submit();">Delete
                                    <form action="{{ URL::route('teams.destroy',$team['id']) }}" method="POST">
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
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>