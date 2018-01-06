@extends('admin.admin-index')

@section('title','Добавить пост')

@section('content')

    <div class="col s10 mycontainer">
        <div class="form-group">

            <table class="table">
                <th>Заголовок Статьи</th>
                <th>Дата</th>
                <th>Текст Статьи</th>
                <th>Управление</th>

                @foreach($post as $item)
                    <tr>
                        <td>{!! $item->title !!}</td>

                        <td> {{Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>

                        <td>{!! $item->text !!}</td>

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

    <div class="col s7 mycontainer">

        {!! Form::open(['route'=>'admin-panel.store']) !!}

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
            <div class="col-md-7 ">
                {!! Form::textarea('text',null,['class'=>'form-control myform']) !!}
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

        .myform {
            min-height: 150px;
        }

        .myflex {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;

        }

        .mymargin {
            padding:  3px 0;

        }

        .mycontainer {
            min-width: 660px;
        }

    </style>

@endsection
