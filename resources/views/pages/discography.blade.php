@extends('layouts.welcome')

@section('titleone','Discography')

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
                    <li>Discography</li>
                </ul>
            </div>
            <div class="w3_agile_breadcrumbs_right">
                <h2>Discography</h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- music -->
    <div class="about w3_music">
        <div class="container">
            <h3 class="agileits_w3layouts_head">All <span>albums</span></h3>
            <div class="wthree_latest_albums_grids">
                <div class="cntl"> <span class="cntl-bar cntl-center"> <span class="cntl-bar-fill"></span> </span>
                    <div class="cntl-states">
                        @foreach($albums as $album)
                        <div class="cntl-state">
                            <div class="cntl-content">
                                <h3 style="font-family: Colonna MT;font-size:1.6em;font-weight:bolder">Name of the album: {{ ucfirst($album->name) }}</h3>
                                <h4>Released year: {{ date('Y', strtotime($album->updated_at)) }}</h4>
                                <h4>Songs: </h4><br/>
                                <p>{!!$album->content!!}</p>
                            </div>
                            <div class="cntl-image">
                                <img src="{{asset('images/'. $album->cover) }}" alt=" " class="img-responsive" />
                                <div class="w3ls_cntl_image_pos">
                                    <p style="font-family: Colonna MT;font-weight:800;font-size:1.9em">{{ ucfirst($album->name) }}</p>
                                </div>
                            </div>
                            <div class="cntl-icon cntl-center"><i class="fa fa-exchange"></i></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //music -->
    <!-- music-bottom -->
    <!--<div class="music-bottom">
        <div class="container">
            <h3>Sign up to receive latest album updates</h3>
            <form action="#" method="post">
                <input name="First Name" placeholder="First Name" type="text" required="">
                <input name="Last Name" placeholder="Last Name" type="text" required="">
                <input name="email" placeholder="Email" type="email" required="">
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </div>-->
    <!-- //music-bottom -->
    <!-- events -->
    <div class="events">
        <div class="container">
            <h3 class="agileits_w3layouts_head">Latest <span>events</span></h3>
            <div class="wthree_latest_albums_grids">
            @foreach($events as $event)
                
                <div class="col-md-4 w3layouts_events_grid">
                    <img src="{{asset('images/'. $event->other_images) }}" alt=" " class="img-responsive" />
                    <ul>
                        <li><a href="#"><i class="fa fa-clock-o"></i>{{ date('d M Y', strtotime($event->updated_at)) }}</a></li>
                        <!--<li><a href="#"><i class="fa fa-comments-o"></i>5 Comments</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>99 Views</a></li>-->
                    </ul>
                    <h4><a href="{{ url('/'.$event->id) }}">{{ ucfirst($event->title) }}</a></h4>
                    <p>{{ ucfirst(substr(strip_tags($event->content), 0, 150)) }}{{ ucfirst(strlen($event->content) > 150 ? "..." : "") }}</p>
                    <div class="w3_more">
                        <a href="{{ url('/'.$event->id) }}">Learn More</a>
                    </div>
                </div>
            @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
    <!-- //events -->
@endsection

@section('scripts')
<script type="text/javascript" src="js/jquery.cntl.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('.cntl').cntl({
                revealbefore: 300,
                anim_class: 'cntl-animate',
                onreveal: function(e) {
                    console.log(e);
                }
            });
        });
    </script>
@endsection