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
                                <div class="title"><strong class="d-block">Basic Form</strong><span
                                        class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                                <div class="block-body">
                                    <form action="{{ url('update_room',$room -> id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Current Image</label>
                                            <img src="/backend/rooms/{{ $room -> image}}" height="100" width="100">
                                            <label class="form-control-label">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Room Title</label>
                                            <input type="text" name="room_title" value="{{ $room -> room_title}}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Room Description</label>

                                            <textarea name="description" cols="10" rows="5"
                                                class="form-control">{{ $room -> description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Room Price</label>
                                            <input type="number" name="price" value="{{ $room -> price}}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Room Wifi</label>

                                            <div class="i-checks">
                                                @if ($room -> wifi == 'Yes')
                                                <input type="radio" id="radioCustom1" name="wifi" value="Yes"
                                                    class="radio-template" checked>
                                                <label for="radioCustom1"
                                                    style="padding-right: 20px !important">Yes</label>
                                                <input id="radioCustom2" type="radio" name="wifi" value="No"
                                                    class="radio-template">
                                                <label for="radioCustom2">No</label>
                                                @else
                                                <input type="radio" id="radioCustom1" name="wifi" value="Yes"
                                                    class="radio-template">
                                                <label for="radioCustom1"
                                                    style="padding-right: 20px !important">Yes</label>
                                                <input id="radioCustom2" type="radio" name="wifi" value="No"
                                                    class="radio-template" checked>
                                                <label for="radioCustom2">No</label>
                                                @endif

                                            </div>


                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Room Type</label>

                                            <select name="room_type" class="form-control">
                                                <option selected disabled value="{{ $room -> room_type}}">{{ $room -> room_type}}
                                                </option>
                                                <option value="Regular">Regular</option>
                                                <option value="Premium">Premium</option>
                                                <option value="Deluxe">Deluxe</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add Room" class="btn btn-primary">
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
