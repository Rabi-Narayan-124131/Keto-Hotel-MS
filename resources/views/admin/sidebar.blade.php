<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{ asset('backend/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li><a href="{{ url('/home') }}"> <i class="icon-home"></i>Home </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('add_room') }}">Add Room</a></li>
                <li><a href="{{ url('view_rooms') }}">View Rooms</a></li>
              </ul>
            </li>
            <li><a href="{{ url('view_bookings') }}"> <i class="fa fa-bar-chart"></i>Bookings </a></li>
            <li> <a href="{{ url('view_gallery') }}"> <i class="icon-writing-whiteboard"></i>Gallery </a></li>
            <li><a href="{{ url('view_messages') }}"> <i class="icon-padnote"></i>Messages </a></li>

    </ul>
  </nav>
