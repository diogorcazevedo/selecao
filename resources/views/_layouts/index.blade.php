<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Instituto de Seleção</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favico/apple-icon-57x57.png')}}"/>
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favico/apple-icon-60x60.png')}}"/>
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favico/apple-icon-72x72.png')}}"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favico/apple-icon-76x76.png')}}"/>
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favico/apple-icon-114x114.png')}}"/>
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favico/apple-icon-120x120.png')}}"/>
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favico/apple-icon-144x144.png')}}"/>
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favico/apple-icon-152x152.png')}}"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favico/apple-icon-180x180.png')}}"/>
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favico/android-icon-192x192.png')}}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favico/favicon-32x32.png')}}"/>
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favico/favicon-96x96.png')}}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favico/favicon-16x16.png')}}"/>
    <link rel="manifest" href="{{asset('favico/manifest.json')}}"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Styles -->
    <link href="{{asset('css/bootstrap_4/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/mediaQuery.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <meta name="google-site-verification" content="Zh5DJWBpLBQyH9SYvMz8PWawM1GAhxUqpWX7rH71ShE" />
    <meta name="google-site-verification" content="Zh5DJWBpLBQyH9SYvMz8PWawM1GAhxUqpWX7rH71ShE" />
    <meta name="google-site-verification" content="Zh5DJWBpLBQyH9SYvMz8PWawM1GAhxUqpWX7rH71ShE" />
    <meta name="google-site-verification" content="Zh5DJWBpLBQyH9SYvMz8PWawM1GAhxUqpWX7rH71ShE" />
</head>

<body class="content-background">


@include('_layouts._navigate.index')


<div class="padding-top-120">
    @if (auth()->check())
        @if(auth()->user()->profile == 'admin')
            @include('project::_navbar.nav')
        @endif
    @endif
    @yield('content')
</div>


<small>@include('errors._check')</small>


        <!-- Scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap_4/bootstrap.js')}}"></script>
<script src="{{asset("js/jquery.mask.min.js")}}"></script>
<script src="{{asset("js/cep.js")}}"></script>

@yield('footer')

</body>
</html>