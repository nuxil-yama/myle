@section('head')
<meta charset="UTF-8">

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=428px, user-scalable=no, viewport-fit=cover"/>

<title>@yield('title') MYLE</title>
<meta name="description" itemprop="description" content="">
<meta name="keywords" itemprop="keywords" content="">

<meta property="og:title" content="@yield('title') MYLE">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ \Request::fullUrl() }}">
<meta property="og:image" content="{{url('dist/images/ogp.jpg')}}">
<meta property="og:site_name" content="">
<meta property="og:description" content="" />
<meta property="fb:app_id" content="">

<meta name="twitter:card" content="summary_large_image">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">

<link href="/dist/css/style.min.css?{{date('Ymd')}}" rel="stylesheet">
<link href="/static/assets/css/layout/custom.min.css?{{date('Ymd')}}" rel="stylesheet">
<link rel="icon" href="{{url('/dist/images/favicon.ico')}}">
<link rel="shortcut icon" href="{{url('/dist/images/favicon.ico')}}">
<link rel="apple-touch-icon" href="/dist/images/apple-touch-icon.png">

<meta name="apple-mobile-web-app-title" content="MYLE" />
<meta name="theme-color" content="#fff">

<script>console.log("ini");</script>
@yield('pageCss')
@endsection
