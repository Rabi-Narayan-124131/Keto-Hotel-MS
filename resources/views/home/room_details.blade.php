<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.meta_css')
    <style>
        .block {
            padding: 38px;
            background: #eaecef;
            color: #2f343d;

        }

    </style>
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
                        <h2>Room Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_room -->
    <div class="our_room">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-8">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="/backend/rooms/{{ $room -> image}}" /></figure>
                        </div>
                        <div class="bed_room">
                            <h2>{{ $room -> room_title}}</h2>
                            <p>{!! Str::limit($room -> description,100) !!}</p>
                            <h4 style="padding: 10px !important">Wifi : {{ $room -> wifi}}</h4>
                            <h4 style="padding: 10px !important">Type : {{ $room -> room_type}}</h4>
                            <h3 style="padding: 10px !important">Price : ${{ $room -> price}}</h3>


                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8">
                    <div class="titlepage">
                        <h2>Book Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                    <div class="block">
                        @if ($errors)

                        @foreach ($errors->all() as $errors)
                        <li style="color: red">{{ $errors }}</li>

                        @endforeach

                        @endif
                        <div class="block-body">
                            <form action="{{ url('add_booking',$room -> id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input type="text" name="name" @if (Auth::id()) value="{{ Auth::user()->name }}"
                                        @endif placeholder="Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" @if (Auth::id()) value="{{ Auth::user()->email }}"
                                    @endif placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Phone</label>
                                    <input type="number" name="phone" @if (Auth::id()) value="{{ Auth::user()->phone }}"
                                    @endif placeholder="Phone" class="form-control">
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Start Date</label>
                                            <input type="date" name="start_date" id="start_date"
                                                placeholder="Start Date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">End Date</label>
                                            <input type="date" name="end_date" id="end_date" placeholder="End Date"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="text-align: center !important">
                                    <input type="submit" value="Book Room" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- end our_room -->

    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    @include('home.scripts')
    <script>
        $(function () {

            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if (month < 10) month = '0' + month.toString();

            if (day < 10) day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#start_date').attr('min', maxDate);
            $('#end_date').attr('min', maxDate);
        });

    </script>
</body>

</html>
