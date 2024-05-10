<!DOCTYPE html>
<html>
  <head>
    @include('admin.meta_css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      @include('admin.page-content')
    </div>
    <!-- JavaScript files-->
    @include('admin.scripts')
  </body>
</html>
