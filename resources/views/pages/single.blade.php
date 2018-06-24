@extends('layouts.welcome') 

@section('titleone',ucfirst($pos->title))

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
                    <li>Event</li>
                </ul>
            </div>
            <div class="w3_agile_breadcrumbs_right">
                <h2>{{ $pos->title }}</h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- breadcrumbs -->
    <!-- icons -->
    <div class="latest-albums">
        <div class="container">
            <div class="grid_3 grid_5 agile">
                <div style="box-shadow:rgba(5, 5, 43, 0.803) 1px 2px 0.5em;border-radius: 0px;margin-top:-70px;font-family: cursive; font-size:1.2em;text-align: justify" class="panel panel-info">
                    <div style="border-radius: 0px" class="panel-heading">
                        <div class="row">
                            <div style="padding:20px" class="col-md-12">
                                <div class="pull-left row"><b>Title :</b> {{ $pos->title }}</div>
                                <div class="pull-right row"><b>Posted on :</b> {{ date('d M Y', strtotime($pos->created_at)) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div style="text-align:justify" class="col-md-12">
                            <span style="float:left;margin-right: 10px;position:inherit"><img style="width:350px" src="{{asset('images/'. $pos->other_images) }}" /></span>
                            <span style="float:right;margin-left: 10px"><img style="width:300px" src="{{asset('images/'. $pos->header_images) }}" /></span>
                            <span style="color:black;white-space:pre-wrap">{!! $pos->content!!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection