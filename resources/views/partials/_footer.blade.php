<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="col-md-4 agileinfo_footer_grid">
                <h3>About Us</h3>
                <p style="text-align:justify">You have landed in the right place, MPD (Music for Peace and Development) is an answer to everything you wanted for entertainmnet in Rwanda and abroad through peaceful music especially Reggae music.</p>
                <div class="agileits_footer_grid_gallery">
                @foreach($footers as $footer)
                    <div class="agileits_footer_grid_gallery1">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="{{asset('images/'. $footer->other_images) }}" alt=" " class="img-responsive" /></a>
                    </div>
                @endforeach
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-4 agileinfo_footer_grid">
                <h3>Facebook Posts</h3>
                <ul class="w3agile_footer_grid_list">
                    <li>Ut aut reiciendis voluptatibus maiores <a href="#">http://symphony@example.com</a> alias, ut aut reiciendis.
                        <span><i class="fa fa-twitter" aria-hidden="true"></i>02 days ago</span></li>
                    <li>Itaque earum rerum hic tenetur a sapiente delectus <a href="#">http://symphony@example1.com</a> ut aut voluptatibus.
                        <span><i class="fa fa-twitter" aria-hidden="true"></i>03 days ago</span></li>
                </ul>
            </div>
            <div class="col-md-4 agileinfo_footer_grid">
                <h3>Social Media</h3>
                <ul class="agileinfo_social_icons">
                    <li><a href="#" class="facebook affix-bottom.bs.affix"><span class="fa fa-facebook" aria-hidden="true"></span><i>-</i>Facebook</a></li>
                    <li><a href="#" class="twitter"><span class="fa fa-twitter" aria-hidden="true"></span><i>-</i>Twitter</a></li>
                    <li><a href="#" class="google"><span class="fa fa-google-plus" aria-hidden="true"></span><i>-</i>Google+</a></li>
                    <li><a href="#" class="instagram"><span class="fa fa-instagram" aria-hidden="true"></span><i>-</i>Instagram</a></li>
                    <li><a href="{{ route('login') }}" class="user"><span class="fa fa-user" aria-hidden="true"></span><i>-</i>Admin</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //footer -->
    <!-- copy-right -->
    <div class="w3agile_copy_right">
        <div class="container">
            <p>© 2018 2Tmpd.com All Rights Reserved</a>
            </p>
        </div>
    </div>
    <!-- //copy-right -->