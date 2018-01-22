@extends('admin.admin-index')

@section('title','Добавить пост')

@yield('header')

@section('breadcrumb')
    <ol class="breadcrumb">

        <li><a href="{{url('admin-panel/')}}">Home</a></li>
        <li><a href="{{url('admin-panel/create')}}">Articles</a></li>
        <li class="prime-text">HELLO</li>
        <li><a class="navbar-brand" href="http://localhost/admin-panel/">
                <img alt="Brand" src="http://localhost/uploads/logo/logo2.png" width="70px">
            </a></li>

    </ol>
@show


@section('content')


    @if (Session::get('message') != Null)
        <div class="row">
            <div class="col-md-12 centered prime-text">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Online</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>

                    @foreach($users as $user)
                        <tr>
                            <td>
                                @if($user->isOnline())
                                    <span style="color:green">Online</span>
                                @else
                                    <span style="color:red">Offline</span>
                                @endif
                            </td>
                            @endforeach
                            <td>{!!$user->id!!}</td>
                            <td>{!! $user->name !!}</td>
                            <td class="raw-m-hide">{!! $user->email !!}</td>
                        </tr>
                </table>
            </div>
            <div class="col-md-11">
                <div class="form-group">

                    <div class="centered">
                        <nav aria-label="Page navigation centered">
                            {{ $post->links() }}
                        </nav>
                    </div>

                    <div class="table-responsive">
                        <table class="table ">

                            <th class="prime-text">Заголовок</th>
                            <th class="prime-text">Текст</th>
                            <th class="prime-text">Изображение</th>

                            @foreach($post as $item)
                                <div class="container-fluid">
                                    <tr>

                                        <td class="col-md-1">{!! $item->title !!}</td>
                                        <td class="col-md-5">{!! $item->text !!}</td>
                                        <td class="col-md-1">
                                            <img src="http://localhost/{!! $item->file !!}" alt="img" width="100px">
                                        </td>


                                    <tr>
                                        <td class="col-md-3">
                                            {{--Show--}}
                                            <a title="Read article" href="{{ url('admin-panel/'.$item->id) }}"
                                               class="btn btn-primary"><span class="fa fa-newspaper-o"></span></a>

                                            {{--Edit--}}
                                            <a title="Edit article" href="{{ url('admin-panel/'.$item->id.'/edit') }}"
                                               class="btn btn-warning"><span class="fa fa-edit"></span></a>

                                            {{--Delete--}}
                                            <button title="Delete article" type="button" class="btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#delete_article_{{ $item->id  }}"><span
                                                        class="fa fa-trash-o"></span></button>

                                        </td>
                                    </tr>

                                    </tr>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>


            <div class="container-fluid">

                <div class="col-md-9">


                    {{--<div class="input-group ">--}}
                    {!! Form::open(['route'=>'admin-panel.store','files' => true]) !!}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-1">
                            {!! Form::submit('send form',['class'=>'btn btn-primary btn-sm buttonText']) !!}
                        </div>
                        <div class="col-md-3">
                            {{--{!! Form::file('file', null,['class'=>'filestyle btn btn-primary']) !!}--}}
                            <input type="file" name="file" class="filestyle btn btn-primary">
                            <script>
                                $(":file").filestyle();
                            </script>
                        </div>
                    </div>

                    {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Заголовок']) !!}



                    {!! Form::text('video',null,['class'=>'form-control','placeholder' => 'Ютуб']) !!}

                    <select name="category_id" class="form-control prime-text">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}} </option>
                        @endforeach
                    </select>

                    {!! Form::textarea('text',null,['class'=>'form-control ','placeholder' => 'Краткое Описание']) !!}

                    {!! Form::label('text', 'Краткое Описание'); !!}
                    <script>
                        CKEDITOR.replace('text');
                    </script>

                    {!! Form::close() !!}

                    {{--</div>--}}
                </div>
                <div class="col-md-2">
                    @widget('recentPosts')
                </div>
            </div>

        </div>
    </div>

    {{--//modal--}}

    @foreach($post as $item)
        <div class="modal fade" id="delete_article_{{ $item->id  }}" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <form class="" action="{{ route('admin-panel.destroy', ['id' => $item->id]) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="mySmallModalLabel">Delete article</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            Are you sure to delete article: <b>{{ $item->title }} </b>?

                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/') }}">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
                                </button>
                            </a>
                            <button type="submit" class="btn btn-outline" title="Delete" value="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach

    {{--<div class="centered">{{$date = Carbon::today()}};</div>--}}





@endsection
