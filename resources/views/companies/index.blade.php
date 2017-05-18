@extends('layouts.app')

@section('title', 'List Companies')

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
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        {{--<th>#</th>--}}
                        <th>Company Name</th>
                        <th>Sponsorship Level</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            {{--<td>{{ $company->id }}</td>--}}
                            <td>{{ $company->companyName }}</td>
                            <td>{{ $company->sponsor->name }}</td>
                            <td><a href="{{ route('companies.edit', $company->id) }}">Edit</a></td>
                            {{--<td><a href="{{ url('/sponsors', [$company->id]) }}">Edit</a></td>--}}
                            {{--<td><a href="{{ url('/sponsors', [$company->id]) }}" data-method="DELETE" data-confirm="Are you sure?" data-token="{{csrf_token()}}>Delete</a></td>--}}
                            <td>
                                <a data-method="delete" style="cursor:pointer;" onclick="$(this).find('form').submit();">Delete
                                    <form action="{{ URL::route('companies.destroy',$company['id']) }}" method="POST">
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
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>