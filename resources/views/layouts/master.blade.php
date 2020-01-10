<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lasinkyay</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Laravel Mix - CSS File --}}
        <link rel="stylesheet" href="{{ mix('vendor/lasinkyay/css/lasinkyay.css') }}">
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        {{-- Laravel Mix - JS File --}}
        <script src="{{ mix('vendor/lasinkyay/js/lasinkyay.js') }}"></script>
    </body>
</html>
