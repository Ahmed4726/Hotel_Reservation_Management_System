<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class RoomController extends Controller
{
    Public function index(){
        $current_date = Carbon::now()->format('d/m/Y');
        $room_all = DB::table('rooms')
        ->leftJoin('order_details', function ($join) {
            $join->on('order_details.room_id', '=', 'rooms.id')
                 ->where('order_details.checkout_date', '=', DB::raw("(SELECT MAX(checkout_date) FROM order_details WHERE order_details.room_id = rooms.id)"));
        })
        ->where('order_details.checkout_date', '<=', $current_date)
        ->where('rooms.status', '=', 'Available')
        ->groupBy('rooms.id')
        ->select('rooms.*')
        ->paginate(4);
    
        return view('front.room',compact('room_all'));
   }

    public function single_room($id){
       
        $single_room_data=Room::with('rRoomPhoto')->where('id',$id)->first();
        
     
        return view('front.room_detail',compact('single_room_data'));
    }
}
