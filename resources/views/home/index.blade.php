<!DOCTYPE html>
<html lang="en">
   <head>
    @include('home.meta_css')
   </head>
   <!-- body -->
   <body class="main-layout">
    @include('sweetalert::alert')
      @include('home.loader_header')
      <!-- banner -->
      @include('home.banner')
      <!-- end banner -->
      <!-- about -->
      @include('home.about')
      <!-- end about -->
      <!-- our_room -->
      @include('home.our_room')
      <!-- end our_room -->
      <!-- gallery -->
      @include('home.gallery')
      <!-- end gallery -->
      <!-- blog -->
      @include('home.blog')
      <!-- end blog -->
      <!--  contact -->
      @include('home.contact')
      <!-- end contact -->
      <!--  footer -->
     @include('home.footer')
      <!-- end footer -->
      @include('home.scripts')
   </body>
</html>
