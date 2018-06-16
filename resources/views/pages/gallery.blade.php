@extends('layouts.welcome1')

@section('content')
<div class="banner1">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                    <h1><a style="color:rgb(23, 216, 23);font-family: Berlin Sans FB Demi" class="navbar-brand" href="{{ route('first') }}">2T<span style="font-family: Berlin Sans FB Demi;color:rgb(233, 220, 36)">mpd<span style="font-family: Berlin Sans FB Demi;color:rgb(218, 40, 40)">.com</span></span></a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav class="menu menu--iris">
                        <ul class="nav navbar-nav menu__list">
                            <li class="menu__item {{ Request::is('/') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('first') }}" class="menu__link">Home</a></li>
                            <li class="menu__item {{ Request::is('biography') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('biography') }}" class="menu__link">Biography</a></li>
                            <li class="menu__item {{ Request::is('discography') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('discography') }}" class="menu__link">Discography</a></li>
                            <li class="menu__item"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="#" class="menu__link">Charity</a></li>
                    
                            <li class="menu__item {{ Request::is('gallery') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('gallery') }}" class="menu__link">Gallery</a></li>
                            <li class="menu__item {{ Request::is('contact_us') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('contactUs') }}" class="menu__link">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    <!-- //banner -->
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3l_breadcrumbs_left">
                <ul>
                    <li><a href="index.html">Home</a><i>/</i></li>
                    <li>Gallery</li>
                </ul>
            </div>
            <div class="w3_agile_breadcrumbs_right">
                <h2>Gallery</h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- gallery -->
    <div class="latest-albums">
        <div class="container">
            <h3 class="agileits_w3layouts_head">Latest <span>Gallery</span></h3>
            <div class="wthree_latest_albums_grids gallery">
                    <div class="col-md-4 agile_gallery_grid">
                            @foreach ( $others as $other )
                                <div class="agileits_w3layouts_gallery_grid">
                                    <a href="{{asset('images/'. $other->img) }}">
                                        <img src="{{asset('images/'. $other->img) }}" alt=" " class="img-responsive" />
                                        <div class="caption">
                                            <div class="blur"></div>
                                            <div class="caption-text">
                                                <h3>{{ ucfirst($other->title) }}</h3>
                                                <p>{{ ucfirst(substr(strip_tags($other->detail), 0, 200)) }}{{ ucfirst(strlen($other->detail) > 200 ? "..." : "") }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            
                            @foreach( $firsts as $first )
                                <div class="agileits_w3layouts_gallery_grid w3_agileits_gallery_grid">
                                    <a href="{{asset('images/'. $first->img) }}">
                                        <img src="{{asset('images/'. $first->img) }}" alt=" " class="img-responsive" />
                                        <div class="caption">
                                            <div class="blur"></div>
                                            <div class="caption-text">
                                                    <h3>{{ ucfirst($first->title) }}</h3>
                                                    <p>{{ ucfirst(substr(strip_tags($first->detail), 0, 200)) }}{{ ucfirst(strlen($first->detail) > 200 ? "..." : "") }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            
                            @foreach ( $ands as $other )
                                <div class="agileits_w3layouts_gallery_grid">
                                    <a href="{{asset('images/'. $other->img) }}">
                                        <img src="{{asset('images/'. $other->img) }}" alt=" " class="img-responsive" />
                                        <div class="caption">
                                            <div class="blur"></div>
                                            <div class="caption-text">
                                                    <h3>{{ ucfirst($other->title) }}</h3>
                                                    <p>{{ ucfirst(substr(strip_tags($other->detail), 0, 200)) }}{{ ucfirst(strlen($other->detail) > 200 ? "..." : "") }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4 agile_gallery_grid">
                                @foreach ( $others1 as $other )
                                    <div class="agileits_w3layouts_gallery_grid">
                                        <a href="{{asset('images/'. $other->img) }}">
                                            <img src="{{asset('images/'. $other->img) }}" alt=" " class="img-responsive" />
                                            <div class="caption">
                                                <div class="blur"></div>
                                                <div class="caption-text">
                                                        <h3>{{ ucfirst($other->title) }}</h3>
                                                        <p>{{ ucfirst(substr(strip_tags($other->detail), 0, 200)) }}{{ ucfirst(strlen($other->detail) > 200 ? "..." : "") }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                
                                @foreach ( $ands1 as $other )
                                    <div class="agileits_w3layouts_gallery_grid">
                                        <a href="{{asset('images/'. $other->img) }}">
                                            <img src="{{asset('images/'. $other->img) }}" alt=" " class="img-responsive" />
                                            <div class="caption">
                                                <div class="blur"></div>
                                                <div class="caption-text">
                                                        <h3>{{ ucfirst($other->title) }}</h3>
                                                        <p>{{ ucfirst(substr(strip_tags($other->detail), 0, 200)) }}{{ ucfirst(strlen($other->detail) > 200 ? "..." : "") }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                
                                @foreach( $firsts1 as $first )
                                    <div class="agileits_w3layouts_gallery_grid w3_agileits_gallery_grid">
                                        <a href="{{asset('images/'. $first->img) }}">
                                            <img src="{{asset('images/'. $first->img) }}" alt=" " class="img-responsive" />
                                            <div class="caption">
                                                <div class="blur"></div>
                                                <div class="caption-text">
                                                        <h3>{{ ucfirst($first->title) }}</h3>
                                                        <p>{{ ucfirst(substr(strip_tags($first->detail), 0, 200)) }}{{ ucfirst(strlen($first->detail) > 200 ? "..." : "") }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-4 agile_gallery_grid">
                                    
                                    @foreach( $firsts2 as $first )
                                        <div class="agileits_w3layouts_gallery_grid w3_agileits_gallery_grid">
                                            <a href="{{asset('images/'. $first->img) }}">
                                                <img src="{{asset('images/'. $first->img) }}" alt=" " class="img-responsive" />
                                                <div class="caption">
                                                    <div class="blur"></div>
                                                    <div class="caption-text">
                                                            <h3>{{ ucfirst($first->title) }}</h3>
                                                            <p>{{ ucfirst(substr(strip_tags($first->detail), 0, 200)) }}{{ ucfirst(strlen($first->detail) > 200 ? "..." : "") }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                    @foreach ( $others2 as $other )
                                        <div class="agileits_w3layouts_gallery_grid">
                                            <a href="{{asset('images/'. $other->img) }}">
                                                <img src="{{asset('images/'. $other->img) }}" alt=" " class="img-responsive" />
                                                <div class="caption">
                                                    <div class="blur"></div>
                                                    <div class="caption-text">
                                                            <h3>{{ ucfirst($other->title) }}</h3>
                                                            <p>{{ $other->detail }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    
                                    @foreach ( $ands2 as $other )
                                        <div class="agileits_w3layouts_gallery_grid">
                                            <a href="{{asset('images/'. $other->img) }}">
                                                <img src="{{asset('images/'. $other->img) }}" alt=" " class="img-responsive" />
                                                <div class="caption">
                                                    <div class="blur"></div>
                                                    <div class="caption-text">
                                                            <h3>{{ ucfirst($other->title) }}</h3>
                                                            <p>{{ $other->detail }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<!-- gallery-pop-up -->
<script type="text/javascript" src="/js/simple-lightbox.js"></script>
<script>
    $(function() {
        var $gallery = $('.gallery a').simpleLightbox();

        $gallery.on('show.simplelightbox', function() {
                console.log('Requested for showing');
            })
            .on('shown.simplelightbox', function() {
                console.log('Shown');
            })
            .on('close.simplelightbox', function() {
                console.log('Requested for closing');
            })
            .on('closed.simplelightbox', function() {
                console.log('Closed');
            })
            .on('change.simplelightbox', function() {
                console.log('Requested for change');
            })
            .on('next.simplelightbox', function() {
                console.log('Requested for next');
            })
            .on('prev.simplelightbox', function() {
                console.log('Requested for prev');
            })
            .on('nextImageLoaded.simplelightbox', function() {
                console.log('Next image loaded');
            })
            .on('prevImageLoaded.simplelightbox', function() {
                console.log('Prev image loaded');
            })
            .on('changed.simplelightbox', function() {
                console.log('Image changed');
            })
            .on('nextDone.simplelightbox', function() {
                console.log('Image changed to next');
            })
            .on('prevDone.simplelightbox', function() {
                console.log('Image changed to prev');
            })
            .on('error.simplelightbox', function(e) {
                console.log('No image found, go to the next/prev');
                console.log(e);
            });
    });
</script>
@endsection