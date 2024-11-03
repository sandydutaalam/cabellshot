<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class FilterDateController extends Controller
{
    public function index(){
        return view('admin.filter-date.index');
    }

    public function filter(Request $request)
    {
        $request->validate([
            'fromdate' => 'required|date',
            'todate' => 'required|date|after_or_equal:fromdate',
        ]);

        $bookings = Booking::whereBetween('booking_date', [$request->fromdate, $request->todate])->get();

        return view('admin.filter-date.filter', compact('bookings'));
    }

}
