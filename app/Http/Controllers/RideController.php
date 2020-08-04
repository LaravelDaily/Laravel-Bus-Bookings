<?php

namespace App\Http\Controllers;

use App\Ride;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RideController extends Controller
{
    public function index()
    {
        $ridesDates = Ride::where('departure_time', '>', now())
            ->where('is_booking_open', 1)
            ->orderBy('departure_time', 'asc')
            ->get()
            ->groupBy(function ($ride) {
                return Carbon::parse($ride->departure_time)->format('Y-m-d');
            });

        return view('front.rides', compact('ridesDates'));
    }
}
