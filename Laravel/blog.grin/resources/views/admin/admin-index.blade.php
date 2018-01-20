<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Dancing+Script" rel="stylesheet">

    <script src="{{asset('assets/js/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/myapp.js')}}"></script>
    <script src="{{asset('assets/admin/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-filestyle.js')}}"></script>

    <title>@yield('title')</title>
</head>
<body>

@section('header')

    <nav class="navbar navbar-inverse">
        <div class="navbar-header col-md-12">
            <div class="container-fluid">


                <div class="collapse navbar-collapse ">
                    <ul class="nav navbar-nav  ">
                        <li><a href="{{url('admin-panel/')}}">Home</a></li>
                        <li><a href="{{route('categories.create')}}">Add_Category</a></li>
                        <li><a href="{{url('admin-panel/create')}}">Add_Atricle</a></li>
                        <li><a href="{{url('http://blog-lara/articles')}}">Articles_By_Category</a></li>
                        <li><a href="{{route('contact.store')}}">E-mail</a></li>
                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="{{('/profile/'.Auth::user()->name)}}">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>

                @section('breadcrumb')
                    <ol class="breadcrumb">

                        <li ><a href="{{url('admin-panel/')}}">Home</a></li>
                        <li><a href="{{url('admin-panel/create')}}">Articles</a></li>
                        <li class="prime-text">HELLO</li>
                        <li><a class="navbar-brand" href="http://localhost/admin-panel/">
                                <img alt="Brand" src="http://localhost/uploads/logo/logo2.png" width="70px">
                            </a></li>

                    </ol>
                @endsection


            </div>
        </div>
    </nav>


@show

@section('errors')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
@show
@yield('content')

</body>
</html>