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

    <!--Content_section-->
@include('site.content')
<!--Content_section-->

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
