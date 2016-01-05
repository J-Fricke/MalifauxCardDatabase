<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/theme.default.min.css') !!}

    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/jquery.tablesorter.min.js') !!}

    <style>
        body { padding-top: 60px; }
        @media (max-width: 979px) {
            body { padding-top: 0px; }
        }
    </style>
    @yield('head')
</head>

@include('partials.navbar')

<body>
<div class="container">
    @yield('content')
</div><!-- /.container -->
</body>
</html>