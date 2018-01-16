@extends('admin.admin-index')

@section('title','Просмотр поста')

@yield('header')

@section('breadcrumb')
    <ol class="breadcrumb">

        <li><a href="{{url('admin-panel/')}}">Home</a></li>
        <li><a href="{{url('admin-panel/create')}}">Posts</a></li>
        <li class="prime-text">HELLO</li>
        <li><a class="navbar-brand" href="http://localhost/admin-panel/">
                <img alt="Brand" src="http://localhost/uploads/logo/logo2.png" width="70px">
            </a></li>

    </ol>
@show

@section('content')

        <div class="container">
            <blockquote>
        <div class="row">
            <div class="col-md-2">
                <span class=" title centered">{{$post->title}}</span><br>
                <span class="date">{!! Carbon\Carbon::parse($post->created_at)->format('d/m/Y') !!}</span><br>
                <span class="text">{!! $post->slug !!}</span><br>
                <span class="text">{!! $post->text !!}</span>

            </div>

            <div class="col-md-4">
                <span>
                    <a href="http://localhost/{!! $post->file !!}">
                        <img class="responsive-img" src="http://localhost/{!! $post->file !!}" alt="img" width="350px">
                    </a>
                </span>
            </div>

            <div class="col-md-5">
                <span class="text">
                    <div class="media ">
                        <iframe width="460" height="315" src="{{$post->video}}" frameborder="0"
                                            gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </div>
                </span>
            </div>

        </div>
            </blockquote>
        </div>



@endsection