@extends('layouts.welcome')

@section('titleone','2Tmpd')

@section('titletwo','Home')

@section('content')
<!-- banner-bottom -->
<div class="banner-bottom">
    <div style="margin-top: 20px;margin-bottom: 20px;" class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($firsts as $first)

                        <div class="item active">
                            <a href="{{ url($first->id) }}">
                            <img style="width:100%" src="{{asset('images/'. $first->other_images) }}" alt="...">
                            <div style="margin-bottom:30px" class="carousel-caption">
                                <h3>{{ ucfirst($first->title) }}</h3>
                                <p>{{ ucfirst(substr(strip_tags($first->content), 0, 80)) }}{{ ucfirst(strlen($first->content) > 80 ? "..." : "") }}</p>
                            </div>
                            </a>
                        </div>
                        @endforeach 
                        
                        @foreach($others as $other)

                        <div class="item">
                            <a href="{{ url($other->id) }}">
                            <img style="width:100%" src="{{asset('images/'. $other->other_images) }}" alt="...">
                            <div style="margin-bottom:30px"  class="carousel-caption">
                                <h3>{{ ucfirst($other->title) }}</h3>
                                <p>{{ ucfirst(substr(strip_tags($other->content), 0, 80)) }}{{ ucfirst(strlen($other->content) > 80 ? "..." : "") }}</p>
                            </div>
                            </a>
                        </div>
                        @endforeach


                    </div>

                    <!-- Controls -->
                    <a style="color: oldlace" class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a style="color: oldlace" class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div style="border-radius: 0px" class="panel panel-success">
                    <div style="border-radius: 0px" class="panel-heading">
                        <h2 style="font-family: Colonna MT;font-size:1.8em;font-weight:800;text-align:center;color:black">New Song</h2>
                    </div>
                    <div class="panel-body">
                        @foreach($songs as $video)
                        <div class="row col-md-12">
                            <a class="pull-left" href="{{ url('/song/'.$video->id) }}">
                                        <img style="width:100px;height:100px;" class="media-object" src="{{asset('images/'. $video->img) }}" alt="...">
                            </a>
                            <div class="media-body">
                                <a style="vertical-align:middle;" href="{{ url('/song/'.$video->id) }}">
                                    <h4 style="padding-left:10px;text-align:justify;white-space:pre-wrap;color:rgb(47, 71, 75);font-family:cursive" class="media-heading">{{ ucfirst($video->title) }}</h4>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div style="border-radius: 0px" class="panel-heading">
                        <h2 style="font-family: Colonna MT;font-size:1.8em;font-weight:800;text-align:center;color:black">New Album</h2>
                    </div>
                    <div class="panel-body">
                        @foreach($albums as $album)
                        <div class="row col-md-12">
                            <a class="pull-left" href="{{ url('/discography') }}">
                                <img style="width:100px;height:100px" class="media-object" src="{{asset('images/'. $album->cover) }}" alt="...">
                            </a>
                            <div class="media-body">
                                <a href="{{ url('/discography') }}"><h4 style="margin-top:30px;padding-left:10px;text-align:justify;white-space:pre-wrap;color:rgb(47, 71, 75);font-family:cursive;font-size:1.2em" class="media-heading">{{ ucfirst($album->name) }}</h4></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div style="border-radius: 0px" class="panel panel-success">
                    <div style="border-radius: 0px" class="panel-heading">
                        <h2 style="font-family: Colonna MT;font-size:1.8em;font-weight:800;text-align:center;color:black">Advertisement</h2>
                    </div>
                    <div class="panel-body">
                        @foreach($albums as $album)
                        <div class="row col-md-12">
                            <center><a href="/discography"><img style="width:100%;height:100%;position:relative" class="img-responsive" src="{{asset('images/'. $album->cover) }}" alt="..."></a></center>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner-bottom -->

<!-- team -->
<div class="team">
    <div style="margin-bottom: 10px" class="col-md-3 agile_team_left">
        <h3 style="font-family: Colonna MT;font-size: 3em">New videos</h3>
    </div>
    <div class="col-md-9 agile_team_grid">
        <ul id="flexiselDemo1">
            @foreach($videos as $video)
            <a href="{{ url('/video/'.$video->id) }}"><li>
                <div class="hovereffect1 w3ls_banner_bottom_grid">
                    <img style="position: relative" src="{{asset('images/'. $video->img) }}" alt=" " class="img-responsive" />
                    <div class="overlay">
                        <a href="{{ url('/video/'.$video->id) }}">
                            <h4 style="font-size:1.2em">{{ ucfirst(substr(strip_tags($video->title), 0, 50)) }}{{ ucfirst(strlen($video->title) > 50 ? "..." : "") }}</h4>
                        </a>
                        <!--<ul class="social_agileinfo">
                        <li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
                    </ul>-->
                    </div>
                </div>
            </li>
            </a>
            @endforeach
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //team -->

<!-- about -->
<div class="about">
    <div class="container">
        <div class="w3_agile_about_grids">
            <div class="col-md-6 w3_agile_about_grid_left">
                <img src="images/5.jpg" alt=" " class="img-responsive" />
            </div>
            <div class="col-md-6 w3_agile_about_grid_right">
                <h3>Welcome to 2Tmpd.com</h3>
                <p style="font-size:1.2em;text-align:justify"><span>You have landed in the right place, MPD (Music for Peace and Development) is an answer to everything you wanted for entertainment in Rwanda and abroad through peaceful music especially Reggae music.</span></p>
                <p style="font-size:1.2em;text-align:justify"><span>Positivity, freedom, peace, love, respect and development are keys to everything we engage in.</span></p>
                <p style="font-size:1.2em;text-align:justify"><span>Are you positive? Please, welcome to partner with us.</span></p>
                <p style="font-size:1.2em;text-align:justify"><span>Are you negative? Please, stay away.</span></p>
                <p style="font-size:1.2em;text-align:center"><span>Thank you!</span></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //about -->
<!-- features -->
<div class="features">
    <div class="container">
        @foreach($eventss as $eventses)
        <div class="col-md-6 agile_features_left">
            <img src="{{asset('images/'. $eventses->other_images) }}" alt=" " class="img-responsive" />
        </div>
        <div class="col-md-6 agile_features_right">
            <p><a style="text-transform:lowercase" href="mailto:2tmpdexameple@gmail.com">ntakirutimanaf@gmail.com</a>
                <h4>Up coming event: {{ ucfirst($eventses->title) }}</h4>
            </p>
            <ul>
                <li><span>Details</span>: {{ ucfirst(substr(strip_tags($eventses->content), 0, 200)) }}{{ ucfirst(strlen($eventses->content) > 200 ? "..." : "") }}</li>
            </ul>
        </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //features -->
<!-- latest-albums -->
<div class="latest-albums">
    <div class="container">
        <h3 class="agileits_w3layouts_head"><span style="font-family: cursive">New updates of</span> <span>All events.</span></h3>
        <!--<p class="w3_agileits_para">Quisque faucibus vel leo a luctus.</p>-->
        <div class="wthree_latest_albums_grids">
            @foreach ($events as $event)
            <a href="{{ url($event->id) }}">
                <div class="col-md-4 wthree_latest_albums_grid_left">
                    <figure class="effect-julia">
                        <img style="height: 500px; width: 100%" src="{{ asset('images/'. $event->header_images) }}" alt=" " class="img-responsive" />
                        <figcaption>
                            <div class="w3l_banner_figure">
                                <p>{{ substr($event->title, 0, 30) }}{{ strlen($event->title) > 30 ? '...' : "" }}</p>
                                <p>{{ ucfirst(substr(strip_tags($event->content), 0, 150)) }}{{ ucfirst(strlen($event->content) > 150 ? "..." : "") }}</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </a>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection