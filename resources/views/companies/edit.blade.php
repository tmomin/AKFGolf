@extends('layouts.app')

@section('title', 'Edit Company Info')

@section('content')

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h2>Add New Company</h2>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <div class="row col-md-8 col-md-offset-3">
            <form class="form-inline" action="{{ URL::route('companies.update',$company['id']) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="{{ $company->id }}">
                <div class="form-group">
                    <label class="sr-only" for="companyName">Company Name</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" required value="{{ $company->companyName }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="sponsorId">Sponsorship Level</label>
                    <select class="form-control" id="sponsorId" name="sponsorId" required>
                        @foreach($sponsors as $sponsor)
                            @if($sponsor->id == $company->sponsorId)
                                <option selected value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                            @else
                                <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit Company</button>
            </form>
        </div>

    </div> <!-- /container -->

@endsection