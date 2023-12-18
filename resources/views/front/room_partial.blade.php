@if(count($rooms) > 0)
    <div class="row">
        @foreach ($rooms as $room)
            @php
                $columnClass = (count($rooms) == 1) ? 'col-md-6 offset-md-3' : 'col-md-6';
                $columnClass = (count($rooms) == 3) ? 'col-md-4' : $columnClass;
            @endphp

            <div class="{{ $columnClass }}" style="margin-top: 10%;">
                <div class="inner" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                    <div class="photo">
                        <img src="{{ asset('uploads/' . $room->featured_photo) }}" alt="" style="width: {{ $columnClass == 'col-md-4' ? '100%' : '490px' }};">
                    </div>
                    <div class="text">
                        <h2 class="text-center mt-3"><a href="{{ route('room_detail', $room->id) }}" style="color:black;">{{ $room->name }}</a></h2>
                        <div class="price text-center" style="color:#e75542;">
                            MYR{{ $room->price }}/night
                        </div>
                        <div class="text-center">
                        <div class="button mt-3">
                        <a href="{{ route('room_detail', $room->id) }}" class="btn btn-primary" style="background: #ffe7e2; color: #e75542; width: 100%; display: inline-block; text-decoration: none; border:none; text-align: center; padding: 6px; border-radius: 5px; transition: background 0.3s;">
    See Detail
</a>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No rooms available.</p>
@endif
