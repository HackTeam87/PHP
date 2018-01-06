@extends('admin.admin-index')

@section('title','Просмотр поста')

@section('content')
    <div class="container">
        <blockquote>
            <span class=" title centered">{{$post->title}}</span>
            <br>
            <span class="date">{{Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span>
            <br>
            <span class="text">{{$post->text}}</span>
        </blockquote>


    </div>

    <style>

        blockquote {
            background-color: mediumseagreen;
        }
        
        span {
            color: #ffffff;
        }
        .title {
            font-size: 24px;
            font-family: 'Dancing Script', cursive;
            letter-spacing: 2px;

        }
        .centered {
            text-align: center;
        }

        .text {
            font-size: 18px;
            font-family: 'Cinzel', serif
        }
    </style>
@endsection