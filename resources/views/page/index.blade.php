@extends('layouts.common')

@section('title', '')
@section('keywords', '')
@section('description', '')

@section('pageCss') 
@endsection

@include('layouts.head')

{{-- @include('layouts.header') --}}


@section('content')
<main>
    <img src="{{url('static/assets/img/top/img.jpg')}}" alt="">
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{url('static/assets')}}/js/modernizr.js"></script>
<script src="{{url('static/assets')}}/js/common.min.js"></script>

<script>
    var ua = navigator.userAgent
    var sp = (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)
    if (sp) new ViewportExtra(375)
</script>
@endsection

@section('pageJs')
@endsection

{{-- @include('layouts.footer') --}}

