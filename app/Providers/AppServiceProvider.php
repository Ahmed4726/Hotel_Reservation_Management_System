<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Page;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $page_data = Page::where('id', 1)->first();
        $room_data = Room::get();

        view()->share('global_page_data', $page_data);
        view()->share('global_room_data', $room_data);

        Validator::extend('max_adults', function ($attribute, $value, $parameters, $validator) {
            $room = Room::find($parameters[0]);

            if (!$room) {
                return false; // Room not found
            }
            // dd($room->total_guests);
            return $value <= $room->total_guests;
        });
    }
}
