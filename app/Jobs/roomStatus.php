<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class roomStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->roomstatus();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }

    public function roomstatus()
    {
        $current_date = Carbon::now()->format('d/m/Y');
    
        DB::table('order_details')
            ->join('rooms', 'order_details.room_id', '=', 'rooms.id')
            ->where('order_details.checkout_date', '>', $current_date)
            ->update(['rooms.status' => 'Available']);
    }
    

}