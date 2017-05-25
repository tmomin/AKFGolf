@extends('layouts.app')

@section('title', 'Add New Company')

@section('content')

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h2>Add New Company</h2>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <div class="row col-md-8 col-md-offset-3">
            <form class="form-inline" method="post" action="{{ url('/companies') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="sr-only" for="companyName">Company Name</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="sponsorshipLevel">Sponsorship Level</label>
                    <select class="form-control" id="sponsorshipLevel" name="sponsorshipLevel" required>
                        @foreach($sponsors as $sponsor)
                            <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Company</button>
            </form>
        </div>

    </div> <!-- /container -->

@endsection