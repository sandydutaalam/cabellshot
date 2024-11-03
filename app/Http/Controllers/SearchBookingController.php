<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class SearchBookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = collect();
        $sdata = '';

        if ($request->has('searchdata')) {
            // Validate input
            $request->validate([
                'searchdata' => 'required|string',
            ]);

            $sdata = $request->input('searchdata');

            // Search bookings based on input
            $bookings = Booking::where('id', 'like', "$sdata%")
                ->orWhereHas('user', function ($query) use ($sdata) {
                    $query->where('name', 'like', "$sdata%")
                          ->orWhere('phone_number', 'like', "$sdata%");
                })
                ->get();
        }

        return view('admin.search-booking.index', compact('bookings', 'sdata')); // Return view with bookings
    }
}
