@extends('layouts.app')

@section('title', 'Add New Player')

@section('content')
    <link rel="stylesheet" href="http://szimek.github.io/signature_pad/css/signature-pad.css">
    <link href="//www.fuelcdn.com/fuelux/3.6.3/css/fuelux.min.css" rel="stylesheet">
    <style>
        .m-signature-pad--footer
        .button.cancel {
            height:20px;
            width:50px;
            margin: -20px -25px;
            position:relative;
            top:100%;
            left:50%;
        }
    </style>

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <form>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input class="form-control" type="text" id="firstName">
                    <label for="lastName">Last Name</label>
                    <input class="form-control" type="text" id="lastName">
                    {{--@include('partial.datepicker')--}}
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="phone" id="phone">
                </div>
            </form>
            <h1>Welcome to AKF Golf 2017</h1>
            <p>This site is to be used to check players on the of the tournament.</p>
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
            <p><button id="signnow" class="btn btn-info">Sign Now</button></p>
        </div>

    </div> <!-- /container -->

@endsection

<script src="http://szimek.github.io/signature_pad/js/signature_pad.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('#signature-pad').hide();
        $('#signnow').click(function () {
            $('#signature-pad').show();
            $.getScript("../js/akfgolf.js");
        })
        $('.cancel').click(function () {
            $('#signature-pad').hide();
        })
    });
</script>