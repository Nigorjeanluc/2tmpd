<nav class="navbar navbar-default">
    <div class="navbar-header navbar-left">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a style="color:rgb(23, 216, 23);font-family: Berlin Sans FB Demi;letter-spacing:2px" class="navbar-brand" href="{{ route('first') }}">2T<span style="font-family: Berlin Sans FB Demi;color:rgb(233, 220, 36);letter-spacing:2px">Mpd<span style="font-family: Berlin Sans FB Demi;color:rgb(218, 40, 40);letter-spacing:2px">.com</span></span></a></h1>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <nav class="menu menu--iris">
            <ul class="nav navbar-nav menu__list">
                <li class="menu__item {{ Request::is('/') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('first') }}" class="menu__link">Home</a></li>
                <li class="menu__item {{ Request::is('biography') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('biography') }}" class="menu__link">Biography</a></li>
                <li class="menu__item {{ Request::is('discography') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('discography') }}" class="menu__link">Discography</a></li>
                <li class="menu__item {{ Request::is('charity') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('charity') }}" class="menu__link">Charity</a></li>

                <li class="menu__item {{ Request::is('gallery') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('gallery') }}" class="menu__link">Gallery</a></li>
                <li class="menu__item {{ Request::is('contact_us') ? "menu__item--current" : ""}}"><a style="font-family:Berlin Sans FB Demi; font-size: 1em" href="{{ route('contactUs') }}" class="menu__link">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</nav>