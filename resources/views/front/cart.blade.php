@extends('front.app')

@section('main_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->cart_heading }}</h2>
            </div>
        </div>
    </div>
</div>



<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">
                
                @if(session()->has('cart_room_id'))


                


                <div class="table-responsive">
    <table class="table table-bordered table-cart">
        <thead>
            <tr>
                <th></th>
                <th>Serial</th>
                <th>Photo</th>
                <th>Room Info</th>
                <th>Price/Night</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Guests</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        @php
    $arr_cart_room_id = session()->get('cart_room_id', []);
    $arr_cart_checkin_date = session()->get('cart_checkin_date', []);
    $arr_cart_checkout_date = session()->get('cart_checkout_date', []);
    $arr_cart_adult = session()->get('cart_adult', []);
    $arr_cart_children = session()->get('cart_children', []);
    $total_price = 0;

    for ($i = 0; $i < count($arr_cart_room_id); $i++) {
        $room_data = DB::table('rooms')->where('id', $arr_cart_room_id[$i])->first();

        // Parse the checkin and checkout dates using Carbon
        $checkin_date = Carbon\Carbon::createFromFormat('d/m/Y', $arr_cart_checkin_date[$i]);
        $checkout_date = Carbon\Carbon::createFromFormat('d/m/Y', $arr_cart_checkout_date[$i]);

        // Calculate the difference in days
        $diff_in_days = $checkout_date->diffInDays($checkin_date);

        $subtotal = $room_data->price * $diff_in_days;

        $total_price += $subtotal;
    @endphp
                <tr>
                    <td>
                        <a href="{{ route('cart_delete', $arr_cart_room_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Are you sure?');">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                    <td>{{ $i + 1 }}</td>
                    <td><img src="{{ asset('uploads/'.$room_data->featured_photo) }}" alt="{{ $room_data->name }}"></td>
                    <td>
                        <a href="{{ route('room_detail', $room_data->id) }}" class="room-name">{{ $room_data->name }}</a>
                    </td>
                    <td>MYR{{ $room_data->price }}</td>
                    <td>{{ $arr_cart_checkin_date[$i] }}</td>
                    <td>{{ $arr_cart_checkout_date[$i] }}</td>
                    <td>
                        Adult:{{ $arr_cart_adult[$i] }}<br>
                        Children: {{ $arr_cart_children[$i] }}
                    </td>
                    <td>MYR{{ $subtotal }}</td>
                </tr>
            @php
            }
            @endphp
            <tr>
                <td colspan="8" class="tar">Total:</td>
                <td>MYR{{ $total_price }}</td>
            </tr>
        </tbody>
    </table>
</div>
                      

                <div class="checkout mb_20">
                    <a href="{{ route('checkout') }}" class="btn btn-primary bg-website">Checkout</a>
                </div>

                @else


                <div class="text-danger mb_30">
                     
                    Cart is empty

                </div>

                @endif

            </div>
        </div>
    </div>
</div>
@endsection
