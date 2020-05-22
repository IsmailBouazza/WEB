<div class="page-wrapper chiller-theme toggled">
    <nav id="sidebar" class="sidebar-wrapper bg-dark" style="margin-top: 50px">
      <div class="sidebar-content">
        <div class="sidebar-header">
          <div class="user-pic" style="height: 60px">
            <img class="img-responsive img-rounded" src="{{asset('storage/'.Auth::user()->picture)}}" alt="User picture">
          </div>
          <div class="user-info">
            <span class="user-name">
              <strong>{{Auth::user()->name}}</strong>
            </span>
            <span class="user-role">Administrator</span>
            <span class="user-status">
              <i class="fa fa-circle" style="color: green"></i>
              <span style="color: green">Online</span>
            </span>
          </div>
        </div>
        <!-- sidebar-header  -->
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>General</span>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fas fa-home"></i>
                <span>Profile</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="{{ url('/user/'.Auth::user()->id) }}">Home</a>
                  </li>
                  <li>
                    <a href="{{ url('/user/'.Auth::user()->id.'/edit') }}">Update</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar">
              <a href="#">
                <i class="fas fa-envelope-open-text"></i>
                <span>Messages</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fas fa-shopping-cart"></i>
                <span>Items</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="{{ url('/items/myitems/'.Auth::user()->id) }}">My collection</a>
                  </li>
                  <li>
                    <a href="{{ url('Item/create/') }}">Add</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar">
              <a href="{{ url('/MyRequests') }}">
                <i class="fas fa-bell"></i>
                <span>Requests</span>
              </a>
            </li>
            <li class="sidebar">
              <a href="{{ url('/MyReservations') }}">
                <i class="fas fa-check-square"></i>
                <span>Reservations</span>
              </a>
            </li>
            <li class="header-menu">
              <span>Extra</span>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-heart"></i>
                <span>Favorite</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
    </nav>