@extends('layouts.dashboard')

@section('title', 'Home')

@section('pageview')
      <h1>
        User Dashboard
        <small>All controls</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{ route('events.index') }}"><span class="info-box-icon bg-aqua"><i class="fa fa-list"></i></span></a>

          <div class="info-box-content">
            <span class="info-box-number">All events</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{ route('messages') }}"><span class="info-box-icon bg-red"><i class="fa fa-comment-o"></i></span></a>

          <div class="info-box-content">
            <span class="info-box-number">All messages</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{ route('albums.index') }}"><span class="info-box-icon bg-green"><i class="fa fa-sliders"></i></span></a>

          <div class="info-box-content">
            <span class="info-box-number">All albums</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{ route('imgs.index') }}"><span class="info-box-icon bg-yellow"><i class="fa fa-photo"></i></span></a>

          <div class="info-box-content">
            <span class="info-box-number">Gallery</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{ route('videos.index') }}"><span class="info-box-icon bg-purple"><i class="fa fa-film"></i></span></a>

          <div class="info-box-content">
            <span class="info-box-number">All Videos</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{ route('songs.index') }}"><span class="info-box-icon bg-teal"><i class="fa fa-music"></i></span></a>

          <div class="info-box-content">
            <span class="info-box-number">All Songs</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{ route('upcoming.index') }}"><span class="info-box-icon bg-gray"><i class="fa fa-thumb-tack"></i></span></a>

          <div class="info-box-content">
            <span class="info-box-number">Upcoming events</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
</div>
@endsection

@section('scripts')
<!-- jQuery Knob -->
<script src="/admin/plugins/knob/jquery.knob.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- page script -->
    <script>
        $(function () {
          /* jQueryKnob */
      
          $(".knob").knob({
            /*change : function (value) {
             //console.log("change : " + value);
             },
             release : function (value) {
             console.log("release : " + value);
             },
             cancel : function () {
             console.log("cancel : " + this.value);
             },*/
            draw: function () {
      
              // "tron" case
              if (this.$.data('skin') == 'tron') {
      
                var a = this.angle(this.cv)  // Angle
                    , sa = this.startAngle          // Previous start angle
                    , sat = this.startAngle         // Start angle
                    , ea                            // Previous end angle
                    , eat = sat + a                 // End angle
                    , r = true;
      
                this.g.lineWidth = this.lineWidth;
      
                this.o.cursor
                && (sat = eat - 0.3)
                && (eat = eat + 0.3);
      
                if (this.o.displayPrevious) {
                  ea = this.startAngle + this.angle(this.value);
                  this.o.cursor
                  && (sa = ea - 0.3)
                  && (ea = ea + 0.3);
                  this.g.beginPath();
                  this.g.strokeStyle = this.previousColor;
                  this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                  this.g.stroke();
                }
      
                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                this.g.stroke();
      
                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();
      
                return false;
              }
            }
          });
          /* END JQUERY KNOB */
      
          //INITIALIZE SPARKLINE CHARTS
          $(".sparkline").each(function () {
            var $this = $(this);
            $this.sparkline('html', $this.data());
          });
      
          /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
          drawDocSparklines();
          drawMouseSpeedDemo();
      
        });
        function drawDocSparklines() {
      
          // Bar + line composite charts
          $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
          $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {composite: true, fillColor: false, lineColor: 'red'});
      
      
          // Line charts taking their values from the tag
          $('.sparkline-1').sparkline();
      
          // Larger line charts for the docs
          $('.largeline').sparkline('html',
              {type: 'line', height: '2.5em', width: '4em'});
      
          // Customized line chart
          $('#linecustom').sparkline('html',
              {
                height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
                minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3
              });
      
          // Bar charts using inline values
          $('.sparkbar').sparkline('html', {type: 'bar'});
      
          $('.barformat').sparkline([1, 3, 5, 3, 8], {
            type: 'bar',
            tooltipFormat: '',
            tooltipValueLookups: {
              levels: $.range_map({':2': 'Low', '3:6': 'Medium', '7:': 'High'})
            }
          });
      
          // Tri-state charts using inline values
          $('.sparktristate').sparkline('html', {type: 'tristate'});
          $('.sparktristatecols').sparkline('html',
              {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});
      
          // Composite line charts, the second using values supplied via javascript
          $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
          $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
              {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});
      
          // Line charts with normal range marker
          $('#normalline').sparkline('html',
              {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
          $('#normalExample').sparkline('html',
              {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});
      
          // Discrete charts
          $('.discrete1').sparkline('html',
              {type: 'discrete', lineColor: 'blue', xwidth: 18});
          $('#discrete2').sparkline('html',
              {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});
      
          // Bullet charts
          $('.sparkbullet').sparkline('html', {type: 'bullet'});
      
          // Pie charts
          $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});
      
          // Box plots
          $('.sparkboxplot').sparkline('html', {type: 'box'});
          $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
              {type: 'box', raw: true, showOutliers: true, target: 6});
      
          // Box plot with specific field order
          $('.boxfieldorder').sparkline('html', {
            type: 'box',
            tooltipFormatFieldlist: ['med', 'lq', 'uq'],
            tooltipFormatFieldlistKey: 'field'
          });
      
          // click event demo sparkline
          $('.clickdemo').sparkline();
          $('.clickdemo').bind('sparklineClick', function (ev) {
            var sparkline = ev.sparklines[0],
                region = sparkline.getCurrentRegionFields();
            value = region.y;
            alert("Clicked on x=" + region.x + " y=" + region.y);
          });
      
          // mouseover event demo sparkline
          $('.mouseoverdemo').sparkline();
          $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
            var sparkline = ev.sparklines[0],
                region = sparkline.getCurrentRegionFields();
            value = region.y;
            $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
          }).bind('mouseleave', function () {
            $('.mouseoverregion').text('');
          });
        }
      
        /**
         ** Draw the little mouse speed animated graph
         ** This just attaches a handler to the mousemove event to see
         ** (roughly) how far the mouse has moved
         ** and then updates the display a couple of times a second via
         ** setTimeout()
         **/
        function drawMouseSpeedDemo() {
          var mrefreshinterval = 500; // update display every 500ms
          var lastmousex = -1;
          var lastmousey = -1;
          var lastmousetime;
          var mousetravel = 0;
          var mpoints = [];
          var mpoints_max = 30;
          $('html').mousemove(function (e) {
            var mousex = e.pageX;
            var mousey = e.pageY;
            if (lastmousex > -1) {
              mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
            }
            lastmousex = mousex;
            lastmousey = mousey;
          });
          var mdraw = function () {
            var md = new Date();
            var timenow = md.getTime();
            if (lastmousetime && lastmousetime != timenow) {
              var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
              mpoints.push(pps);
              if (mpoints.length > mpoints_max)
                mpoints.splice(0, 1);
              mousetravel = 0;
              $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
            }
            lastmousetime = timenow;
            setTimeout(mdraw, mrefreshinterval);
          };
          // We could use setInterval instead, but I prefer to do it this way
          setTimeout(mdraw, mrefreshinterval);
        }
      </script>

@endsection