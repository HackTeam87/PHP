<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<title>Document</title>--}}
</head>
<body>
@extends('admin.admin-index')

@section('title','Добавить Категорию')

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

    @if (Session::get('message') != Null)
        <div class="row">
            <div class="col-md-12 centered prime-text">
                {{ Session::get('message') }}
            </div>
        </div>
        </div>
    @endif


    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="centered ">
                    <nav aria-label="Page navigation centered">
                        {{ $categories->links() }}
                    </nav>
                </div>
                <div class="table-responsive">
                    <table class="table">

                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Count</th>
                        <th>Control</th>
                        @foreach($categories as $cat)
                            <tr>

                                <td>{!! $cat->id !!}</td>
                                <td>{!! $cat->title !!}</td>
                                <td>{!! $cat->slug !!}</td>
                                <td>{{$cat->posts->count()}}</td>


                                <td>
                                    {{--Delete--}}
                                    <button title="Delete article" type="button" class="btn btn-danger"
                                            data-toggle="modal" data-target="#delete_article_{{ $cat->id  }}"><span
                                                class="fa fa-trash-o"></span></button>
                                </td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-md-12">
                {{--<div class="input-group ">--}}
                {!! Form::open(['route'=>'categories.store','files' => true,'enctype' => 'multipart/form-data']) !!}

                <div class="row">
                    <div class="col-md-1">
                        {!! Form::submit('send form',['class'=>'btn btn-primary btn-sm buttonText']) !!}
                    </div>
                </div>

                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Категория']) !!}

                {!! Form::text('slug',null,['class'=>'form-control','placeholder' => 'Slug']) !!}


                {!! Form::close() !!}
                {{--</div>--}}
            </div>
        </div>

    </div>



    {{--//modal--}}

    @foreach($categories as $cat)
        <div class="modal fade" id="delete_article_{{ $cat->id  }}" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <form class="" action="{{ route('categories.destroy', ['id' => $cat->id]) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}

                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="mySmallModalLabel">Delete article</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            Are you sure to delete article: <b>{{ $cat->title }} </b>?

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


@endsection
</body>
</html>