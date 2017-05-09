@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Welcome to AKF Golf 2017</h1>
        <p>This site is to be used to check players on the of the tournament.</p>
        <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
        <p><button id="clear" class="btn btn-info">Clear</button></p>
    </div>

</div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    $(function() {
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
            backgroundColor: 'rgba(255, 255, 255, 1)',
            penColor: 'rgb(0, 0, 0)'
        });
        var cancelButton = document.getElementById('clear');
        cancelButton.addEventListener('click', function (event) {
            signaturePad.clear();
        });
    })
</script>