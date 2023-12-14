@if(count($rooms) > 0)
    @if(count($rooms) <= 2)
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-6" style="margin-top: 10%;">
                    <div class="inner" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                        <div class="photo">
                            <img src="{{ asset('uploads/' . $room->featured_photo) }}" alt="" style="width: 490px;">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('room_detail', $room->id) }}">{{ $room->name }}</a></h2>
                            <div class="price">
                                MYR{{ $room->price }}/night
                            </div>
                            <div class="button">
                                <a href="{{ route('room_detail', $room->id) }}" class="btn btn-primary">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row row-rooms">
            @foreach ($rooms as $room)
                <div class="col-md-4" style="margin-top: 10%;">
                    <div class="inner" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                        <div class="photo">
                            <img src="{{ asset('uploads/' . $room->featured_photo) }}" alt="" style="width: 300px;">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('room_detail', $room->id) }}">{{ $room->name }}</a></h2>
                            <div class="price">
                                MYR{{ $room->price }}/night
                            </div>
                            <div class="button">
                                <a href="{{ route('room_detail', $room->id) }}" class="btn btn-primary">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@else
    <p>No rooms available.</p>
@endif
