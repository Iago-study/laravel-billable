<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <div id="app">
        @include ('layouts.partials._navigation')

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include ('layouts.partials._notifications')
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('braintree')
    <script src="//js.pusher.com/3.0/pusher.min.js"></script>
    <script>
        var pusher = new Pusher("{{env("PUSHER_APP_KEY")}}")
        var channel = pusher.subscribe('test-channel');
        channel.bind('test-event', function(data) {
          alert(data.text);
        });
    </script>

</body>
</html>
