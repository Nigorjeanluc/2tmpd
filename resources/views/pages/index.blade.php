@extends('layouts.welcome')
@section('content')

<!-- banner-bottom -->
<div class="banner-bottom">
<div style="margin-top: 20px;margin-bottom: 20px;" class="row col-md-12">
    <div class="col-md-12">
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
                            <div style="margin-bottom:70px" class="carousel-caption">
                                <h3>{{ ucfirst($first->title) }}</h3>
                                <p>When it hits you, you feel no pain</p>
                            </div>
                            </a>
                        </div>
					@endforeach
					@foreach($others as $other)
						
                        <div class="item">
                            <a href="{{ url($other->id) }}">
                            <img style="width:100%" src="{{asset('images/'. $other->other_images) }}" alt="...">
                            <div style="margin-bottom:70px"  class="carousel-caption">
                                <h3>{{ ucfirst($other->title) }}</h3>
                                <p>When it hits you, you feel no pain</p>
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

        <div class="well col-md-3">
            <h2 align="center">New Songs</h2>
            <hr/>
                <ul class="media-list">
                    @foreach($videos as $video)
                    <li class="media">
                        <a class="pull-left" href="#">
                            <img style="width:100px;height:100px" class="media-object" src="{{asset('images/'. $video->img) }}" alt="...">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ ucfirst($video->title) }}</h4>
                            {{ ucfirst(substr(strip_tags($video->youtube_link), 0, 150)) }}{{ ucfirst(strlen($video->youtube_link) > 150 ? "..." : "") }}
                        </div>
                    </li>
                    @endforeach
                 </ul>
            </div>

            <div class="well col-md-3">
                    <h2 align="center">All albums</h2>
                    <hr/>
                <ul class="media-list">
                    @foreach($albums as $album)
                    <li class="media">
                        <a class="pull-left" href="#">
                            <img style="width:100px;height:100px" class="media-object" src="{{asset('images/'. $album->cover) }}" alt="...">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ ucfirst($album->name) }}</h4>
                            {{ ucfirst(substr(strip_tags($album->content), 0, 150)) }}{{ ucfirst(strlen($album->content) > 150 ? "..." : "") }}
                        </div>
                    </li>
                    @endforeach
                 </ul>
            </div>
    </div>
</div>

<!--<div class="col-md-3 agileits_w3layouts_banner_bottom_grid">
    <div class="hovereffect">
        <img align="center" style="height:200px" src="images/2.jpg" alt=" " class="img-responsive" />
        <div class="overlay">
            <h3 class="w3_instruments">Music Events</h3>
            <div class="rotate">
                <p class="group1">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </p>
                <hr>
                <hr>
                <p class="group2">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="agileinfo_banner_bottom_grid">
        <div class="agileits_banner_bottom_grid1">
            <h4 class="w3ls_color">Symphony</h4>
            <h3>Viking Music</h3>
            <p>Praesent suscipit nunc vel orci dictum pretium.</p>
        </div>
    </div>
</div>
<div class="col-md-3 agileits_w3layouts_banner_bottom_grid">
    <div class="hovereffect">
        <img style="height:200px" src="images/22.jpg" alt=" " class="img-responsive" />
        <div class="overlay">
            <h3 class="w3_instruments">Music Instruments</h3>
            <div class="rotate">
                <p class="group1">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </p>
                <hr>
                <hr>
                <p class="group2">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="agileinfo_banner_bottom_grid">
        <div class="agileits_banner_bottom_grid1">
            <h4 class="w3ls_color">Symphony</h4>
            <h3>Viking Music</h3>
            <p>Praesent suscipit nunc vel orci dictum pretium.</p>
        </div>
    </div>
</div>
<div class="col-md-3 agileits_w3layouts_banner_bottom_grid">
    <div class="hovereffect">
        <img style="height:200px" src="images/3.jpg" alt=" " class="img-responsive" />
        <div class="overlay">
            <h3 class="w3_instruments">Music Instruments</h3>
            <div class="rotate">
                <p class="group1">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </p>
                <hr>
                <hr>
                <p class="group2">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="agileinfo_banner_bottom_grid w3l_banner_bottom1">
        <div class="agileits_banner_bottom_grid1">
            <h4 class="w3ls_color1">Symphony</h4>
            <h3>Hormonica Music</h3>
            <p>Praesent suscipit nunc vel orci dictum pretium.</p>
        </div>
    </div>
</div>
<div class="col-md-3 agileits_w3layouts_banner_bottom_grid">
    <div class="hovereffect">
        <img style="height:200px;width:100%" src="images/4.jpg" alt=" " class="img-responsive" />
        <div class="overlay">
            <h3 class="w3_instruments">Music Instruments</h3>
            <div class="rotate">
                <p class="group1">
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                </p>
                <hr>
                <hr>
                <p class="group2">
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="agileinfo_banner_bottom_grid w3l_banner_bottom2">
        <div class="agileits_banner_bottom_grid1">
            <h4 class="w3ls_color2">Symphony</h4>
            <h3>Trumpet Playing</h3>
            <p>Praesent suscipit nunc vel orci dictum pretium.</p>
        </div>
    </div>
</div>
<div class="clearfix"></div>-->
</div>
<!-- //banner-bottom -->
<!-- team -->
<div class="team">
<div style="margin-bottom: 10px" class="col-md-3 agile_team_left">
    <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">New videos</h3>
</div>
<div class="col-md-9 agile_team_grid">
    <ul id="flexiselDemo1">
        @foreach($videos as $video)
        <li>
            <div class="hovereffect1 w3ls_banner_bottom_grid">
                <img style="position: relative" src="{{asset('images/'. $video->img) }}" alt=" " class="img-responsive" />
                <div class="overlay">
                    <h4>{{ ucfirst(substr(strip_tags($video->title), 0, 10)) }}{{ ucfirst(strlen($video->title) > 10 ? "..." : "") }}</h4>
                    <h4>{{ ucfirst(substr(strip_tags($video->youtube_link), 0, 10)) }}{{ ucfirst(strlen($video->youtube_link) > 10 ? "..." : "") }}</h4>
                    <ul class="social_agileinfo">
                        <li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </li>
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
            <!--<h4>Music Album</h4>-->
            <p style="font-size:1.2em;text-align:justify"><span>You have landed in the right place, MPD (Music for Peace and Development) is an answer to everything you wanted for entertainmnet in Rwanda and abroad through peaceful music especially Reggae music.</span></p>
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
            <p><a href="mailto:2tmpdexameple@gmail.com">ntakirutimanaf@gmail.com</a> Sed tempus, ligula eu rhoncus mollis, purus.</p>
            <h4>Up coming event</h4>
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
    @endforeach
        <div class="clearfix"> </div>
    </div>
</div>
</div>
@endsection