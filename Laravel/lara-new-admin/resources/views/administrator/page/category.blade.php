@extends('layouts.cms.admin')
@section('title' , 'Категория'.$categories->title)

@section('content')


    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="links">
                @foreach($categories->posts as $post)
                    <a href="{{ route('post', [$categories->slug, $post->id]) }}" class="article-title">

                        {{ $post->title }}

                    </a>
                    <br>
                @endforeach

            </div>
        </div>
    </div>

@endsection