@extends('layouts.app')

@section('title', 'Add New Player')

@section('content')

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Add New Player</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
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
                            <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="teamid">Company</label>
                    <select class="form-control" id="teamId" name="teamId" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Player</button>
            </form>
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>