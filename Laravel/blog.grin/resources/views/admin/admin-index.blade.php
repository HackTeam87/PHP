<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/materialize/css/materialize.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Dancing+Script" rel="stylesheet">
    <script src="{{asset('assets/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('assets/materialize/js/materialize.js')}}"></script>
    <script src="{{asset('assets/materialize/js/init.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body>
@section('header')

    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo center">Admin</a>
            <div class="col s2 left">
                <a href="{{url('admin-panel/')}}" class="breadcrumb">Home</a>
                <a href="{{url('admin-panel/create')}}" class="breadcrumb">Posts</a>
            </div>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{url('admin-panel/')}}">Home</a></li>
                <li><a href="{{url('admin-panel/users')}}">Users</a></li>
                <li><a href="{{url('admin-panel/categories')}}">Categories</a></li>
                <li><a href="{{url('admin-panel/create')}}">Posts</a></li>
                <li><a href="{{url('admin-panel/email')}}">E-mail</a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a href="{{url('admin-panel/')}}">Home</a></li>
                <li><a href="{{url('admin-panel/users')}}">Users</a></li>
                <li><a href="{{url('admin-panel/categories')}}">Categories</a></li>
                <li><a href="{{url('admin-panel/create')}}">Posts</a></li>
                <li><a href="{{url('admin-panel/email')}}">E-mail</a></li>
            </ul>

            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

@show
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--@yield('content')--}}
    {{--</div>--}}
{{--</div>--}}

@yield('content')
</body>
</html>