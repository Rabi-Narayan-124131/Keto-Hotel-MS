<!DOCTYPE html>
<html>

<head>
    @include('admin.meta_css')
    <style>
        .galleryimg {
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
                    <h2 class="h5 no-margin-bottom">Gallery</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Gallery </li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Basic Form-->
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="title"><strong class="d-block">Gallery Form</strong><span
                                        class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                                <div class="block-body">
                                    <form action="{{ url('add_image_gallery') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Upload Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Add Image" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title"><strong>Gallery</strong></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="color: #DB6574">#</th>
                                                <th style="color: #DB6574">Gallery Image</th>

                                                <th style="color: #DB6574">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $gallery)

                                            <tr>
                                                <th scope="row">{{ $gallery -> id}}</th>
                                                <td>
                                                    <img src="backend/gallery/{{ $gallery -> image}}"
                                                        class="galleryimg">
                                                </td>
                                                <td>
                                                    <a href="{{ url('delete_image',$gallery -> id) }}"
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
                        swal("Your image is safe!");
                    }
                });
            Swal.fire({
                title: 'Image Removed From Gallery Successfully!',
                text: 'Add New!',
                icon: 'success',
                confirmButtonText: 'OK',
            }).then(function () {
                location.reload();
            });
        }

    </script>
</body>

</html>
