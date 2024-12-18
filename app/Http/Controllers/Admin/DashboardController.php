<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Contact;
use App\Models\Booking;
use App\Models\Service;
use App\Models\EventType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetching statistics
        $totalUnreadQueries = Contact::where('is_read','0')->count();
        $totalReadQueries = Contact::where('is_read', '1')->count();
        $totalNewBookings = Booking::whereNull('status')->count();
        $allBookings = Booking::count();
        $totalApprovedBookings = Booking::where('status', 'Approved')->count();
        $totalCancelledBookings = Booking::where('status', 'Cancelled')->count();
        $totalServices = Service::count();
        $totalEventTypes = EventType::count();

        return view('admin.dashboard', compact(
            'totalUnreadQueries',
            'totalReadQueries',
            'totalNewBookings',
            'allBookings',
            'totalApprovedBookings',
            'totalCancelledBookings',
            'totalServices',
            'totalEventTypes'
        ));
    }
}
