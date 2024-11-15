@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">About</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="container">
            <div class="wthree-services-bottom-grids">
                <div class="col-md-6 wthree-services-left">
                    <img src="{{ asset('images/LOGO.jpg') }}" alt="">
                </div>
                <div class="col-md-6 wthree-services-right">
                    <div class="wthree-services-right-top">
                        <h4>{{ $page->title }}</h4>
                        <p>{!! $page->description !!}</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
