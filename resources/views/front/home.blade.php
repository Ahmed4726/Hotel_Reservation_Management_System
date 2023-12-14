@extends('front.app')

@section('main_content')
    <div class="slider">
        <div class="slide-carousel owl-carousel">

            @foreach ($slide_all as $item)
                <div class="item slide-img" style="background-image:url({{ asset('uploads/' . $item->photo) }});">
                    <div class="bg"></div>
                    <div class="text">
                        <h2 data-animation="fadeInUp" data-delay="500ms">{{ $item->heading }}</h2>
                        <p data-animation="fadeInUp" data-delay="700ms">
                            {{-- {!! $item->text !!} --}}
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora quia blanditiis odio!
                        </p>

                        @if ($item->button_text != '')
                            <div class="button">
                                <a href="{{ $item->button_url }}">{{ $item->button_text }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="search-section">
        <div class="container">
<!-- Add the id attribute to the form for easier selection in JavaScript -->
<form id="availabilityForm" action="{{ route('check_room_availablity') }}" method="GET">
    @csrf
    <div class="inner">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                </div>
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-primary">Check Availability</button>
            </div>
        </div>
    </div>
</form>

<div id="room_availability" class="row row-rooms">
    <!-- Your existing code for displaying rooms -->
    @if(isset($rooms) && $rooms != null)
        @include('front.room_partial')
    @endif
</div>



    <div class="home-feature">
        <div class="container">
            <div class="row" style="justify-content: center">
                <div class="title-feature" data-aos="fade-up" data-aos-duration="1000">
                    <span>WHAT WE DO</span>
                    <h2>Discover Our Services</h2>
                </div>


                <div class="container-feature">
                    @foreach ($feature_all as $item)
                        <div class="col-lg-4 col-sm-6" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500">
                            <div class="inner">
                                <div class="icon"><i class="{{ $item->icon }}"></i></div>
                                <div class="text">
                                    <h2>{{ $item->heading }}</h2>
                                    <p>
                                        {{-- {!! $item->text !!} --}}
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita atque eaque quos.
                                        Culpa, rerum vel!
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>



    <div class="home-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header" data-aos="fade-down" data-aos-duration="1000">Hotel Accomodation</h2>
                </div>
            </div>
            <div class="row row-rooms">
                @if(isset($room_all))
                @foreach ($room_all as $item)
                    @if ($loop->iteration > 4)
                    @break
                @endif
                
                <div class="col-md-4">
                    <div class="inner" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                        <div class="photo">
                            <img src="{{ asset('uploads/' . $item->featured_photo) }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="{{ route('room_detail', $item->id) }}">{{ $item->name }}</a></h2>
                            <div class="price">
                                MYR{{ $item->price }}/night
                            </div>
                            <div class="button">
                                <a href="{{ route('room_detail', $item->id) }}" class="btn btn-primary">See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @endif
            <div class="big-button" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">
                <a href="{{ route('room') }}" class="btn btn-primary">See All Rooms</a>
            </div>
        </div>
    </div>



    <div class="testimonial" style="background-image: url(uploads/slide2.jpg)">
        <div class="bg"></div>
        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
            <div class="row">
                <div class="col-md-8 offset-md-2 title-testimonial">
                    <span>Testimonials</span>
                    <h2>Our Happy Clients</h2>
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="testimonial-carousel owl-carousel">


                        @foreach ($testimonial_all as $item)
                            <div class="item">


                                <div class="description">
                                    <p>Hotel dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the
                                        lemon sanleo nectan feugiat erat hendrerit necuis ve ante otel inilla duiman at
                                        finibus viverra neca the sene on satien the miss drana inc fermen norttito sit
                                        space, mus nellentesque habitan.
                                        {{-- {!! $item->comment !!} --}}
                                    </p>
                                </div>
                                <div class="profile-testimonial">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/' . $item->photo) }}" alt="">
                                    </div>
                                    <div class="text">
                                        <h4>{{ $item->name }}</h4>
                                        {{-- <p>{{ $item->designation }}</p> --}}
                                        <p>Lorem ipsum dolor sit amet.</p>
                                    </div>
                                    <div class="quote">
                                        <img src="{{ asset('uploads/quote.png') }}" alt="quote">
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="blog-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-down" data-aos-duration="1000">
                    <h2 class="main-header">Latest Posts</h2>
                </div>
            </div>
            <div class="row">

                @foreach ($post_all as $item)
                    <div class="col-md-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset('uploads/' . $item->photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('post', $item->id) }}">{{ $item->heading }}</a></h2>
                                <div class="short-des">
                                    <p>
                                        {!! $item->short_content !!}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('post', $item->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({

                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach
    @endif
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Handle form submission through AJAX
        $('#availabilityForm').submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Perform AJAX request
            $.ajax({
                url: $(this).attr('action'), // Get the form action URL
                method: 'GET',
                data: $(this).serialize(), // Serialize form data
                success: function (response) {
                    // Update the room_availability div with the new content
                    $('#room_availability').html(response);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>


