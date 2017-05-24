@extends('layouts.app')

@section('title', 'Edit Player Info')

@section('content')
    <link rel="stylesheet" href="http://szimek.github.io/signature_pad/css/signature-pad.css">
    <link rel="stylesheet" href="../../css/akfgolf.css">

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h2>Edit Player Info</h2>
            <p>This site is to be used to check players on the of the tournament.</p>
        </div>

        <div class="row col-md-12 form-inline">
            <form class="form-inline" action="{{ URL::route('players.update',$player['id']) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" id="id" name="id" value="{{ $player->id }}">
                <div class="form-group">
                    <label class="sr-only" for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required value="{{ $player->firstName }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required value="{{ $player->lastName }}">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="companyId">Company</label>
                    <select class="form-control" id="companyId" name="companyId" required>
                        @foreach($companies as $company)
                            @if($company->id == $player->companyId)
                                <option selected value="{{ $company->id }}">{{ $company->companyName }}</option>
                            @else
                                <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email" required value="{{ $player->email }}">
                </div>
                @if($player->signature['sig_hash'] === null)
                    <button id="signnow" class="btn btn-info" type="button">Sign Now</button>
                @else
                    <button id="signnow" class="btn btn-info" type="button" disabled>Signed</button>
                @endif
                <div class="form-group">
                    <label class="sr-only" for="teamid">Company</label>
                    <select class="form-control" id="teamId" name="teamId" required>
                        @foreach($teams as $team)
                            @if($team->id == $player->teamId)
                                <option selected value="{{ $team->id }}">{{ $team->name }}</option>
                            @else
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Player</button>
            </form>
            <form class="form-inline" name="checkin" action="{{ URL::route('players.checkin',$player['id']) }}" method="POST">
                @if($player->signature['sig_hash'] === null)
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-primary" onclick="$(this).find('checkin').submit();" disabled="disabled">Checkin</button>
                @else
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-primary" onclick="$(this).find('checkin').submit();">Checkin</button>
                @endif
            </form>
        </div>
        <div id="signature-pad" class="m-signature-pad">
            <div class="m-signature-pad--body">
                <canvas></canvas>
            </div>
            <div class="m-signature-pad--footer">
                <button type="button" class="button cancel">Cancel</button>
                <button type="button" class="button clear" data-action="clear">Clear</button>
                <button type="button" class="button save" data-action="save">Save</button>
            </div>
        </div>
    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('#signature-pad').hide();
        $('#signnow').click(function () {
            $('#signature-pad').show();
            $.getScript("../../js/akfgolf.js");
        })
        $('.cancel').click(function () {
            $('#signature-pad').hide();
        })
    });
</script>