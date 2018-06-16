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
                    <b>Title :</b>{{ $pos->title }}<br /><br />
                    {{ $pos->created_at }}<br /><br />
                    <img style="float:left;width:350px;margin-right: 10px" src="{{asset('images/'. $pos->other_images) }}" />
                    {{ substr(strip_tags($pos->content), 0, 50) }}{{ strlen($pos->content) > 50 ? "..." : "" }}
                    <img style="float:center" src="{{asset('images/'. $pos->header_images) }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection