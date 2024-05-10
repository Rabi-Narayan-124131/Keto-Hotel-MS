<!DOCTYPE html>
<html>

<head>
    @include('admin.meta_css')
    <style>
        .roomimg{
            height: 80px !important;
            max-width: 120px !important;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content" style="padding-bottom: 70px;">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Bookings</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Bookings</li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title"><strong>Bookings</strong></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="color: #DB6574">#</th>
                                                <th style="color: #DB6574">Room Id</th>
                                                <th style="color: #DB6574">Customer Name</th>
                                                <th style="color: #DB6574">Email</th>
                                                <th style="color: #DB6574">Phone</th>
                                                <th style="color: #DB6574">Room Title</th>
                                                <th style="color: #DB6574">Room Image</th>
                                                <th style="color: #DB6574">Room Price</th>
                                                <th style="color: #DB6574">CheckIn Date</th>
                                                <th style="color: #DB6574">CheckOut Date</th>
                                                <th style="color: #DB6574">Status</th>
                                                <th style="color: #DB6574">Actions</th>
                                                <th style="color: #DB6574">Status Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $booking)

                                            <tr>
                                                <th scope="row">{{ $booking -> id}}</th>
                                                <td>{{ $booking -> room_id}}</td>
                                                <td>{{ $booking -> name}}</td>
                                                <td>{{ $booking -> email}}</td>
                                                <td>{{ $booking -> phone}}</td>
                                                <td>{{ $booking ->room-> room_title}}</td>
                                                <td>
                                                    <img src="backend/rooms/{{ $booking ->room-> image}}" class="roomimg">
                                                </td>
                                                <td>${{ $booking ->room-> price}}</td>
                                                <td>{{ $booking -> start_date}}</td>
                                                <td>{{ $booking -> end_date}}</td>
                                                <td>
                                                    @if ( $booking -> status == 'Approved')
                                                    <span style="color: #28a745">Approved</span>

                                                    @elseif($booking -> status == 'Rejected')
                                                    <span style="color: #bb414d">Rejected</span>
                                                    @elseif($booking -> status == 'Waiting')
                                                    <span style="color:#ffc107">Waiting</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('delete_booking',$booking -> id) }}"
                                                        onclick="confirmation(event)">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a href="{{ url('approve_booking',$booking -> id) }}">
                                                        <button type="button" class="btn btn-success btn-sm">Approve</button>
                                                    </a>
                                                    <a href="{{ url('reject_booking',$booking -> id) }}">
                                                        <button type="button" class="btn btn-warning btn-sm">Reject</button>
                                                    </a>
                                                </td>

                                            </tr>

                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.scripts')

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); // Get the URL from the link that was clicked
            console.log(urlToRedirect);
            swal({
                    title: "Are you sure?",
                    text: "Once Delete, you will not be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancle) => {
                    if (willCancle) {
                        window.location.href = urlToRedirect;
                    } else {
                        swal("Your room is safe!");
                    }
                });
                Swal.fire({
            title: 'Booking Removed Successfully!',
            text: 'Go to view bookings!',
            icon: 'success',
            confirmButtonText: 'OK',
        }).then(function () {
            location.reload();
        });
        }

        // // Call the refreshPage function after an item is removed from the cart
        // Swal.fire({
        //     title: 'Booking Removed Successfully!',
        //     text: 'Go to view bookings!',
        //     icon: 'success',
        //     confirmButtonText: 'OK',
        // }).then(function () {
        //     location.reload();
        // });

    </script>

</body>

</html>
