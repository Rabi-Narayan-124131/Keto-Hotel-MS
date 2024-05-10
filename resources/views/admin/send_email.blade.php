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
                    <h2 class="h5 no-margin-bottom">Basic forms</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Basic forms </li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Basic Form-->
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="title"><strong class="d-block">Send Email To {{ $data->name }}</strong><span
                                        class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                                <div class="block-body">
                                    <form action="{{ url('send_email',$data->id) }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label class="form-control-label">Greeting</label>
                                            <input type="text" name="greeting" placeholder="Greeting"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Mail Body</label>

                                            <textarea name="body" cols="10" rows="5"
                                                placeholder="Mail Body" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Action Text</label>
                                            <input type="text" name="action_text" placeholder="Action Text"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Action Url</label>
                                            <input type="text" name="action_url" placeholder="Action Url"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">End Line</label>
                                            <input type="text" name="end_line" placeholder="End Line"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Send Mail" class="btn btn-primary">
                                        </div>
                                    </form>
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
</body>

</html>
