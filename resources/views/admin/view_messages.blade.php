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
                    <h2 class="h5 no-margin-bottom">Messages</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Messages</li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title"><strong>Messages</strong></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="color: #DB6574">#</th>
                                                <th style="color: #DB6574">Name</th>
                                                <th style="color: #DB6574">Email</th>
                                                <th style="color: #DB6574">Phone</th>
                                                <th style="color: #DB6574">Message</th>
                                                <th style="color: #DB6574">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($messages as $message)

                                            <tr>
                                                <th scope="row">{{ $message -> id}}</th>

                                                <td>{{ $message -> name}}</td>
                                                <td>{{ $message -> email}}</td>
                                                <td>{{ $message -> phone}}</td>
                                                <td>{{ $message -> message}}</td>

                                                <td>
                                                    <a href="{{ url('send_email',$message -> id) }}">
                                                        <button type="button" class="btn btn-info btn-sm">Send Email</button>
                                                    </a>
                                                    <a href="{{ url('delete_message',$message -> id) }}"
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
