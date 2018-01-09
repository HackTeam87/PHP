@extends('admin.admin-index')

@section('title','Просмотр поста')

@section('content')
    <div class="container">
        <blockquote>
            <span class=" title centered">{{$post->title}}</span>
            <br>
            <span class="date">{{Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span>
            <br>
            <span class="text">{{$post->slug}}</span>
            <br>
            <span class="text">{{$post->text}}</span>
            <br>
            <span><a href="http://127.0.0.1:8000/{!! $post->file !!}"><img class="responsive-img" src="http://127.0.0.1:8000/{!! $post->file !!}" alt="img" width="350px"></a></span>

            <br>

            <span> <div class="video-container">
                                    <iframe width="360" height="115" src="{{$post->video}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                </div>
            </span>
        </blockquote>


    </div>

    <style>

        blockquote {
            background-color: lightgray;
            border-radius: 8px;
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
            font-family: 'Cinzel', serif;
        }
    </style>
@endsection