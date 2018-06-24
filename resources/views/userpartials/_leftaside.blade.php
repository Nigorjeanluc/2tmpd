<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/images/32.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ Request::is('albums') ? "active" : "" || Request::is('albums/create') ? "active" : "" }}">
              <a href="{{ route('albums.create') }}">
                <i class="fa fa-sliders"></i> <span>New album</span>
              </a>
            </li>
            <li class="treeview {{ Request::is('events') ? "active" : "" || Request::is('events/create') ? "active" : "" }}">
              <a href="{{ route('events.create') }}">
                <i class="fa fa-file-o"></i> <span>New event</span>
              </a>
            </li>
            <li class="treeview {{ Request::is('videos') ? "active" : "" || Request::is('videos/create') ? "active" : "" }}">
              <a href="{{ route('videos.create') }}">
                <i class="fa fa-film"></i> <span>New video</span>
              </a>
            </li>
            <li class="treeview {{ Request::is('songs') ? "active" : "" || Request::is('songs/create') ? "active" : "" }}">
              <a href="{{ route('songs.create') }}">
                <i class="fa fa-music"></i> <span>New song</span>
              </a>
            </li>
            <li class="treeview {{ Request::is('upcoming') ? "active" : "" || Request::is('upcoming/create') ? "active" : "" }}">
              <a href="{{ route('upcoming.create') }}">
                <i class="fa fa-thumb-tack"></i> <span>New upcoming event</span>
              </a>
            </li>
            <li class="treeview {{ Request::is('imgs') ? "active" : "" || Request::is('imgs/create') ? "active" : "" }}">
              <a href="{{ route('imgs.create') }}">
                <i class="fa fa-photo"></i> <span>Gallery</span>
              </a>
            </li>
            <li class="treeview {{ Request::is('messages') ? "active" : "" ||  Request::is('msg/1') ? "active" : "" }}">
              <a href="{{ route('messages') }}">
                <i class="fa fa-bar-chart"></i>
                <span>New messages</span>
                <!--<span class="pull-right-container">
                  <span class="label label-primary pull-right">4</span>
                </span>-->
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    