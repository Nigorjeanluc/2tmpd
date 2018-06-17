@extends('layouts.welcome')
@section('content')

<!-- banner-bottom -->
<div class="banner-bottom">
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3l_breadcrumbs_left">
                <ul>
                    <li><a href="index.html">Home</a><i>/</i></li>
                    <li>Event</li>
                </ul>
            </div>
            <div class="w3_agile_breadcrumbs_right">
                <h2>{{ $pos->title }}</h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- icons -->
    <div class="latest-albums">
        <div class="container">
            <div class="grid_3 grid_5 agile">
                <div style="font-family: cursive; font-size:1.2em;text-align: justify" class="well">
                    <p align="center"><b>Title :</b>{{ $pos->title }}</p><br /><br />
                    {{ $pos->created_at }}<br /><br />
                    <p align="center"><img src="{{asset('images/'. $pos->other_images) }}" /></p>
                    <p style="text-align:justify">{!! $pos->content!!}</p>
                    <p align="center"><img src="{{asset('images/'. $pos->header_images) }}" /></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection