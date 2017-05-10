@extends('layouts.app')

@section('title', 'Add New Player')

@section('content')

    <link rel="stylesheet" href="https://szimek.github.io/signature_pad/css/signature-pad.css">

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <form>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input class="form-control" type="text" id="firstName">
                    <label for="lastName">Last Name</label>
                    <input class="form-control" type="text" id="lastName">
                </div>
            </form>
            <h1>Welcome to AKF Golf 2017</h1>
            <p>This site is to be used to check players on the of the tournament.</p>

            <div id="signature-pad" class="m-signature-pad">
                <div class="m-signature-pad--body">
                    <canvas></canvas>
                </div>
                <div class="m-signature-pad--footer">
                    <div class="description">Sign above</div>
                    <button type="button" class="button clear" data-action="clear">Clear</button>
                    <button type="button" class="button save" data-action="save">Save</button>
                </div>
            </div>
            <p><button id="clear" class="btn btn-info">Clear</button></p>
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://szimek.github.io/signature_pad/js/app.js"></script>

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