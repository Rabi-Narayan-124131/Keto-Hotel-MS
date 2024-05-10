<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.meta_css')
</head>
<!-- body -->

<body class="main-layout">
    @include('sweetalert::alert')
    @include('home.loader_header')

    <!-- end header -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Our Room</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- our_room -->
      @include('home.our_room')
      <!-- end our_room -->

      <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    @include('home.scripts')
</body>

</html>
