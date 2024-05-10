<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="{{ asset('frontend/images/loading.gif')}}" alt="#"/></div>
 </div>
 <!-- end loader -->
 <!-- header -->
 <header>
    <!-- header inner -->
    <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                   <div class="center-desk">
                      <div class="logo">
                         <a href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo.png')}}" alt="#" /></a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarsExample04">
                      <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('our_rooms') }}">Our room</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                         </li>



                         @if (Route::has('login'))

                                @auth
                                <x-app-layout>

                                </x-app-layout>
                                @else

                                    <li class="nav-item" style="padding-right: 10px !important;">
                                        <a class="btn btn-success" href="{{ route('login') }}">Log In</a>
                                     </li>

                                    @if (Route::has('register'))

                                        <li class="nav-item">
                                            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                                         </li>
                                    @endif
                                @endauth

                        @endif

                      </ul>
                   </div>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!-- end header inner -->
 <!-- end header -->
