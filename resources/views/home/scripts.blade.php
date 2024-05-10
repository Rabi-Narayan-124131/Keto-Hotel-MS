<!-- Javascript files-->
<script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery-3.0.0.min.js')}}"></script>
<!-- sidebar -->
<script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
<script>
    $(window).scroll(function() {
        sessionStorage.scrollTop = $(this).scrollTop();
    });
    $(document).ready(function() {
        if (sessionStorage.scrollTop != "undefined") {
            $(window).scrollTop(sessionStorage.scrollTop);
        }
    });
</script>
