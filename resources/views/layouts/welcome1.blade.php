<!--
    author: Ndiramiye Igor J.Luc
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
    <!DOCTYPE html>
    <html lang="en">
    
     @include('partials._head')
    
    <body>
        @yield('content')
        
        @yield('scripts')
        <!-- footer -->
        @include('partials._footer')
        <!-- bootstrap-pop-up -->
        <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Symphony
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <section>
                        <div class="modal-body">
                            <div class="col-md-6 w3_modal_body_left">
                                <img src="images/15.jpg" alt=" " class="img-responsive" />
                            </div>
                            <div class="col-md-6 w3_modal_body_right">
                                <h4>Suspendisse et sapien ac diam suscipit posuere</h4>
                                <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                    consequatur.
                                    <i>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
                                        esse quam nihil molestiae consequatur.</i> Fusce in ex eget ligula tempor placerat. Aliquam laoreet mi id felis commodo interdum. Integer sollicitudin risus sed risus rutrum elementum ac ac purus.</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- //bootstrap-pop-up -->
        <!-- start-smooth-scrolling -->
        <script type="text/javascript" src="/js/move-top.js"></script>
        <script type="text/javascript" src="/js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, 1000);
                });
            });
        </script>
        <script src="/js/bootstrap.js"></script>
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                    var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                    };
                */
    
                $().UItoTop({
                    easingType: 'easeOutQuart'
                });
    
            });
        </script>
        <!-- //here ends scrolling icon -->
    </body>
    
    </html>