<div class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-md-4 col-sm-6">
                <div id="serv_hover" class="room">
                    <div class="room_img">
                        <figure><img src="backend/rooms/{{ $room -> image}}" /></figure>
                    </div>
                    <div class="bed_room">
                        <h3>{{ $room -> room_title}}</h3>
                        <p>{!! Str::limit($room -> description,100) !!}</p>
                        <p style="padding-top: 10px !important">
                            <a type="button" class="btn btn-dark" href="{{ url('room_details',$room-> id) }}">Room
                                Details</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
