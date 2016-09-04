<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>iTunes XML Excel XLS Converter</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css" >
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">



                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {!! trans('home.title') !!}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><img width="32" height="32" alt="{{ session('locale') }}"  src="{!! asset('img/' . session('locale') . '-flag.png') !!}" />&nbsp; <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach ( config('app.languages') as $user)
                                @if($user !== config('app.locale'))
                                    <li><a href="{!! url('language') !!}/{{ $user }}"><img width="32" height="32" alt="{{ $user }}" src="{!! asset('img/' . $user . '-flag.png') !!}"></a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')
    <footer role="contentinfo">
        <p class="text-center"><small>Copyright <a href="//www.treagles.it">www.treagles.it</a></small></p>
        <p class="text-center"><small> <a href="//treagles.it/website/index.php/termini-di-servizio/">{!! trans('home.tos') !!}</a></small><small> <a href="//treagles.it/website/index.php/privacy/">{!! trans('home.privacy') !!}</a></small></p>
    </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
