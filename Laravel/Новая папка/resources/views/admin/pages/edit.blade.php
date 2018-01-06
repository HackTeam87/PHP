@extends('admin.admin-index')

@section('title','Добавить пост')

@section('content')

    <div class="col-md-6">

        {!! Form::model($post,array('route' => array('admin-panel.update',$post->id),'method' => 'PUT')) !!}

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('title','Заголовок') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('slug','Ярлык') !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('slug',null,['class'=>'form-control']) !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-3">
                {!! Form::label('text','Текст поста ') !!}
            </div>
            <div class="col-md-7">
                {!! Form::textarea('text',null,['class'=>'form-control']) !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                {!! Form::submit('Push',['class'=>'waves-effect waves-light btn']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>



    <style>
        .form-group {
            width: 100%;
            display: inline-block;
            margin-bottom: 15px;
        }

        .bigsize {
            font-size: 200%;
        }

    </style>

@endsection
