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
                       <h3>Create task</h3>
                        <div class="row">
                            <div class="col-md-12">

                                {!! Form::open(['route'=>['tasks.store']]) !!}

                                <div class="form-group">
                                    <input type="text" class="form-control" name="title">
                                    <br>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" value="{{csrf_token()}}"></textarea>
                                    <br>
                                    <button class="btn btn-success">Submit</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
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


