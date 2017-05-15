@extends('layouts.app')

@section('title', 'Search')

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
                        <th>#</th>
                        <th>Name</th>
                        <th>Dollar Amount</th>
                        <th>Number of Players</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sponsors as $sponsor)
                        <tr>
                            <td>{{ $sponsor->id }}</td>
                            <td>{{ $sponsor->name }}</td>
                            <td>${{ $sponsor->dollarAmount }}</td>
                            <td>{{ $sponsor->numOfPlayers }}</td>
                            <td><a href="{{ url('/sponsors', [$sponsor->id]) }}">Edit</a></td>
                            <td><a href="{{ url('/sponsors', [$sponsor->id]) }}" data-method="delete" data-confirm="Are you sure?">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- /container -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
    /*
     <a href="posts/2" data-method="delete"> <---- We want to send an HTTP DELETE request
     - Or, request confirmation in the process -
     <a href="posts/2" data-method="delete" data-confirm="Are you sure?">
     */

    (function() {

        var laravel = {
            initialize: function() {
                this.methodLinks = $('a[data-method]');

                this.registerEvents();
            },

            registerEvents: function() {
                this.methodLinks.on('click', this.handleMethod);
            },

            handleMethod: function(e) {
                var link = $(this);
                var httpMethod = link.data('method').toUpperCase();
                var form;

                // If the data-method attribute is not PUT or DELETE,
                // then we don't know what to do. Just ignore.
                if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                    return;
                }

                // Allow user to optionally provide data-confirm="Are you sure?"
                if ( link.data('confirm') ) {
                    if ( ! laravel.verifyConfirm(link) ) {
                        return false;
                    }
                }

                form = laravel.createForm(link);
                form.submit();

                e.preventDefault();
            },

            verifyConfirm: function(link) {
                return confirm(link.data('confirm'));
            },

            createForm: function(link) {
                var form =
                    $('<form>', {
                        'method': 'POST',
                        'action': link.attr('href')
                    });

                var token =
                    $('<input>', {
                        'type': 'hidden',
                        'name': 'csrf_token',
                        'value': '<?php echo csrf_token(); ?>' // hmmmm...
                    });

                var hiddenInput =
                    $('<input>', {
                        'name': '_method',
                        'type': 'hidden',
                        'value': link.data('method')
                    });

                return form.append(token, hiddenInput)
                    .appendTo('body');
            }
        };

        laravel.initialize();

    })();
</script>