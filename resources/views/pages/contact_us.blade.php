@extends('layouts.welcome')

@section('titleone','Contact us')

@section('titletwo','2Tmpd')

@section('content')

<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3l_breadcrumbs_left">
                <ul>
                    <li><a href="{{ route('first') }}">Home</a><i>/</i></li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <div class="w3_agile_breadcrumbs_right">
                <h2>Contact Us</h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- mail -->
    <!--<div class="w3_agile_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.47339848557!2d-0.24168083557398998!3d51.528558242090796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1480393569591"
            style="border:0"></iframe>
    </div>-->
    <div class="latest-albums">
        <div class="container">
            <h3 class="agileits_w3layouts_head"><span>Contact Us</span></h3>
            <div class="wthree_latest_albums_grids gallery">
                @if (Session::has('success'))

                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>

                @endif

                @if (count($errors) > 0)

                <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Errors:</strong>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div> 

                @endif
                <div class="col-md-8 agile_mail_grid_left">
                        <form id="ff" method="POST" action="{{ url('contact_us') }}" data-parsley-validate="">
                                {{ csrf_field() }}
                        <input type="text" name="name" placeholder="Full Name" required="">
                        <input style="margin-top: 20px" type="tel" name="phone" placeholder="Phone" required="">
                        <input type="email" name="email" placeholder="Email" required="">
                        <textarea name="message" placeholder="Your message here..." required=""></textarea>
                        <input type="submit" value="Submit Now">
                    </form>
                </div>
                <div class="col-md-4 w3_agileits_mail_grid_right">
                    <div class="wthree_mail_grid_right">
                        <img src="/images/32.jpg" alt=" " class="img-responsive" />
                        <h4 style="font-size: 2em">2T <span style="color: rgb(rgb(251, 255, 0), green, blue)">Rwandan Reggae Artist</span></h4>
                        <ul class="agileinfo_phone_mail">
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone: +250788519849</li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a href="mailto:ntakirutimanaf@gmail.com">ntakirutimanaf@gmail.com</a></li>
                        </ul>
                        <ul class="social_agileinfo">
                            <li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //mail -->
@endsection