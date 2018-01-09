@extends('admin.admin-index')

@section('title','Добавить пост')

@section('content')

    <div class="container">

        <div class="col m6  mycontainer2">

            {!! Form::open(['route'=>'admin-panel.store','enctype' => 'multipart/form-data']) !!}

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
                    {!! Form::label('slug','Видео') !!}
                </div>
                <div class="col-md-7">
                    {!! Form::text('video',null,['class'=>'form-control']) !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('text','Текст поста ') !!}
                </div>
                <div class="col-md-7 ">
                    {!! Form::textarea('text',null,['class'=>'form-control myform']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </div>

            <div class="form-group mymargin">
                <div class="col-md-9 col-md-offset-3">
                    {!! Form::file('file', ['class'=>'waves-effect pink accent-4']) !!}
                </div>
            </div>


            <div class="form-group mymargin">
                <div class="col-md-9 col-md-offset-3">
                    {!! Form::submit('store',['class'=>'waves-effect teal darken-3 btn']) !!}
                </div>
            </div>


            <div class="form-group mymargin">
                <div class="col-md-9 col-md-offset-3">
                    <ul class="pagination centered">
                        <li class="waves-effect">{{ $post->links() }}</li>
                    </ul>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col  m6  mycontainer">

            <div class="form-group">

                <table class="table">
                    <th class="prime-text">Заголовок</th>
                    <th class="prime-text">Дата</th>
                    <th class="prime-text">Текст</th>
                    <th class="prime-text">Изображение</th>
                    <th class="prime-text">Видео</th>
                    <th class="prime-text">Управление</th>


                    @foreach($post as $item)
                        <tr>
                            <td>{!! $item->title !!}</td>

                            <td> {{Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>

                            <td>{!! $item->text !!}</td>

                            <td><a href="http://127.0.0.1:8000/{!! $item->file !!}"><img class="responsive-img"
                                                                                         src="http://127.0.0.1:8000/{!! $item->file !!}"
                                                                                         alt="img" width="150px"></a>
                            </td>

                            <td>
                                <div class="video-container">
                                    <iframe width="560" height="315" src="{{$item->video}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                </div>
                            </td>


                            <td>

                                <div class="row myflex">

                                    {{--Show--}}

                                    <div class="col s3 mymargin">
                                        <a href="{{ url('admin-panel/'.$item->id) }}"><i
                                                    class=" waves-effect  purple lighten-2 btn material-icons ">web</i></a>
                                    </div>

                                    {{--Edit--}}

                                    <div class="col s3 mymargin">
                                        <a href="{{ url('admin-panel/'.$item->id.'/edit') }}"><i
                                                    class=" waves-effect   deep-orange btn material-icons ">edit</i></a>
                                    </div>

                                    {{--Delete--}}

                                    <div class="col s3 mymargin">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['admin-panel.destroy', $item->id]]) }}
                                        {{ Form::submit('delete', ['class' => ' waves-effect red accent-2 btn material-icons ']) }}
                                        {{ Form::close() }}
                                    </div>


                                </div>

                            </td>
                        </tr>

                    @endforeach
                </table>

            </div>


        </div>

    </div>


    <style>

        .myform {
            min-height: 140px;
            max-width: 700px;
            text-align: center;
        }

        .pagination {
            font-size: 24px;
            font-family: 'Cinzel', serif;
            letter-spacing: 1px;
        }

        .centered {
            text-align: center;
        }

        .myflex {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
        }

        .form-group {
            /*width: 50%;*/
            /*display: inline-block;*/
            margin-bottom: 15px;
        }

        .mycontainer {
            color: #ffffff;
            /*min-width: 660px;*/
            width: auto;
        }

        .mycontainer2 {
            background-color: whitesmoke;
            /*min-width: 660px;*/
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            width: auto;
        }

        .prime-text {
            font-family: 'Cinzel', serif;
            font-size: 22px;
            letter-spacing: 1px;
        }

        body {
            background-color: #0BA9F9;
        }

    </style>

@endsection
