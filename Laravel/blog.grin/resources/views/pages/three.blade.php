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


    <!-- Content -->
    <div id="content-wrapper">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="3u 12u(mobile)">

                        <!-- Left Sidebar -->
                        <section>

                            @foreach ($posts as $post)

                                <a href="/" class="cola">{!! $post->title !!}</a>
                                <br>
                                <span class="short" > {!! $post->short !!}</span>

                                <img src="{!! $post->image !!}"  alt="img" width="150px" />

                            @endforeach


                            <style>

                                a.cola {
                                    color: coral;
                                    font-size: 20px;
                                    letter-spacing: 2px;
                                    text-decoration: none;
                                    text-align: center;
                                    border-bottom: 2px dashed black;

                                }

                                span.short {
                                    text-align: right;
                                    margin: 10px auto 10px;

                                }
                            </style>


                        </section>
                    </div>
                    <div class="6u 12u(mobile) important(mobile)">

                        <!-- Main Content -->
                        <section>
                            @foreach ($posts as $post)

                                <a href="/" class="cola">{!! $post->title !!}</a>
                                <br>
                                <span class="short" > {!! $post->short !!}</span>

                                <img src="{!! $post->image !!}"  alt="img" width="150px" />

                            @endforeach
                        </section>

                    </div>
                    <div class="3u 12u(mobile)">

                        <!-- Right Sidebar -->
                        <section>
                            @foreach ($posts as $post)

                                <a href="/" class="cola">{!! $post->title !!}</a>
                                <br>
                                <span class="short" > {!! $post->short !!}</span>

                                <img src="{!! $post->image !!}"  alt="img" width="150px" />

                            @endforeach
                        </section>


                    </div>
                </div>
            </div>
        </div>
    </div>


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



