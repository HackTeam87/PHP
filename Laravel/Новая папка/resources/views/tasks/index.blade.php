<!DOCTYPE HTML>

<html>
<head>
    <title>GrinBlog</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

<div id="page-wrapper">

    <!--Header_section-->
@include('site.header')
<!--Header_section-->


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Content -->
    <div id="content-wrapper">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <h3>My tasks</h3>
                        <a href="{{route('task.create')}}" class="btn btn-success">Create</a>
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table">

                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Title</td>
                                    <td>Actions</td>
                                </tr>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{!! $post->id !!}</td>
                                    <td>{!! $post->title !!}</td>
                                    <td>{!! $post->description !!}</td>
                                </tr>
                                @endforeach


                                {{--@foreach ($count as $item)--}}
                                    {{--<tr>--}}
                                        {{--<td>{!! $item !!}</td>--}}

                                    {{--</tr>--}}
                                {{--@endforeach--}}

                                </thead>


                                <tbody>
                                <tr>1</tr>
                                <tr>My title</tr>
                                <tr>
                                    <a href="#">
                                        <i class="glyficon glyficon-eye-open"></i>
                                    </a>

                                    <a href="#">
                                        <i class="glyficon glyficon-eye-edit"></i>
                                    </a>

                                    <a href="#">
                                        <i class="glyficon glyficon-eye-remove"></i>
                                    </a>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Content -->


    <!--Footer_section-->
@include('site.footer')
<!--Footer_section-->

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/skel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/skel-viewport.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/util.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
</div>

</body>
</html>


