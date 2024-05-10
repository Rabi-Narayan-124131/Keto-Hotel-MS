<!DOCTYPE html>
<html>

<head>
    @include('admin.meta_css')
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
                    <h2 class="h5 no-margin-bottom">Rooms Data</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Rooms</li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title"><strong>Rooms</strong></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="color: #DB6574">#</th>
                                                <th style="color: #DB6574">Room Image</th>
                                                <th style="color: #DB6574">Room Title</th>
                                                <th style="color: #DB6574">Room Description</th>
                                                <th style="color: #DB6574">Room Price</th>
                                                <th style="color: #DB6574">Room Wifi</th>
                                                <th style="color: #DB6574">Room Type</th>
                                                <th style="color: #DB6574">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $room)

                                            <tr>
                                                <th scope="row">{{ $room -> id}}</th>
                                                <td>
                                                    <img src="backend/rooms/{{ $room -> image}}" height="75" width="75">
                                                </td>
                                                <td>{{ $room -> room_title}}</td>
                                                <td>{{ $room -> description}}</td>
                                                <td>{{ $room -> price}}</td>
                                                <td>{{ $room -> wifi}}</td>
                                                <td>{{ $room -> room_type}}</td>
                                                <td>
                                                    <a href="{{ url('edit_room',$room -> id) }}">
                                                        <button type="button" class="btn btn-info btn-sm">Edit</button>
                                                    </a>
                                                    <a href="{{ url('delete_room',$room -> id) }}"
                                                        onclick="confirmation(event)">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm">Delete</button>
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
        }

        // Call the refreshPage function after an item is removed from the cart
        Swal.fire({
            title: 'Room Removed Successfully!',
            text: 'Add New Room!',
            icon: 'success',
            confirmButtonText: 'OK',
        }).then(function () {
            location.reload();
        });

    </script>

</body>

</html>
