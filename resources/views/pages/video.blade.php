@extends('layouts.welcome')

@section('titleone', $vids->title)

@section('titletwo','2Tmpd')

@section('content')

<!-- banner-bottom -->
<div class="banner-bottom">
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3l_breadcrumbs_left">
                <ul>
                    <li><a href="{{ route('first') }}">Home</a><i>/</i></li>
                    <li>{{ $vids->title }}</li>
                </ul>
            </div>
            <div class="w3_agile_breadcrumbs_right">
                <h2>Videos</h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- icons -->
    <div class="latest-albums">
        <div class="container">
            <div class="grid_3 grid_5 agile">
                <div style="height:400px" class="col-md-8">
                    <div class="embed-responsive embed-responsive-16by9">
                        {!! $vids->youtube_link !!}
                    </div>
                </div>

                <div style="font-family: cursive; font-size:1.2em;text-align: justify" class="col-md-4 well">
                    <b>Title :</b>{{ $vids->title }}<br /><br />
                    {{ $vids->created_at }}<br /><br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection