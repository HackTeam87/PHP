@extends('admin.admin-index')

@section('title','Добавить пост')

@yield('header')

@section('breadcrumb')

    <ol class="breadcrumb">
        <li><a href="{{url('admin-panel/')}}">Home</a></li>
        <li><a href="{{url('admin-panel/create')}}">Posts</a></li>
        <li class="prime-text">HELLO</li>
        <li><a class="navbar-brand" href="http://localhost/admin-panel/">
                <img alt="Brand" src="http://localhost/uploads/logo/logo2.png" width="70px">
            </a>
        </li>
    </ol>

@show


@section('content')

    @if (Session::get('message') != Null)
        <div class="row">
            <div class="col-md-12 centered prime-text">
                {{ Session::get('message') }}
            </div>
        </div>
        </div>
    @endif

    <div class="container ">
        <div class="row">
            <div class="col-md-12 ">
                <div class="input-group ">
                    {!! Form::model($post,array('route' => array('admin-panel.update',$post->id ),'files' => true,'method' => 'PUT')) !!}

                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::submit('send form',['class'=>'btn btn-primary btn-sm buttonText']) !!}
                        </div>
                    </div>

                    {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Заголовок']) !!}

                    <select name="category_id" class="form-control prime-text">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}} </option>
                        @endforeach
                    </select>

                    {!! Form::text('slug',null,['class'=>'form-control','placeholder' => 'Ярлык']) !!}

                    {!! Form::textarea('text',null,['class'=>'form-control ','placeholder' => 'Краткое Описание']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {!! Form::label('text', 'Краткое Описание'); !!}
                    <script>
                        CKEDITOR.replace('text');
                    </script>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
