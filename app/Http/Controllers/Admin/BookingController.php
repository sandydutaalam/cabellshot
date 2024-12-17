<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class BookingController extends Controller
{
    // Menampilkan semua booking
    public function all()
    {
        $allBookings = Booking::with('user')->get(); // Ambil semua booking dengan data user
        return view('admin.bookings.all', compact('allBookings'));
    }
    public function report()
    {
        $allBookings = Booking::with('user')->get(); // Ambil semua booking dengan data user

        $totalIncome = Booking::where('status', 'Approved')
                        ->join('services', 'bookings.service_id', '=', 'services.id')
                        ->sum('services.price');
        
        $allServices = Service::all();

        $bookingCounts = Booking::where('status','Approved')
                            ->select('service_id', DB::raw('COUNT(*) as count'))
                            ->groupBy('service_id')
                            ->pluck('count', 'service_id');

        $serviceIncomes = Booking::where('status', 'Approved')
                            ->join('services', 'bookings.service_id', '=', 'services.id')
                            ->select('bookings.service_id', 'services.name', DB::raw('SUM(services.price) as total_income'))
                            ->groupBy('bookings.service_id', 'services.name')
                            ->pluck('total_income', 'bookings.service_id');

        return view('admin.bookings.report', compact(['allBookings','totalIncome','allServices','bookingCounts','serviceIncomes']));
    }

    public function view_pdf()
    {
        $allBookings = Booking::with('user')->get(); // Ambil semua booking dengan data user

        $totalIncome = Booking::where('status', 'Approved')
                        ->join('services', 'bookings.service_id', '=', 'services.id')
                        ->sum('services.price');
        
        $allServices = Service::all();

        $bookingCounts = Booking::where('status','Approved')
                            ->select('service_id', DB::raw('COUNT(*) as count'))
                            ->groupBy('service_id')
                            ->pluck('count', 'service_id');

        $serviceIncomes = Booking::where('status', 'Approved')
                            ->join('services', 'bookings.service_id', '=', 'services.id')
                            ->select('bookings.service_id', 'services.name', DB::raw('SUM(services.price) as total_income'))
                            ->groupBy('bookings.service_id', 'services.name')
                            ->pluck('total_income', 'bookings.service_id');

        return view('admin.bookings.view_pdf', compact(['allBookings','totalIncome','allServices','bookingCounts','serviceIncomes']));
    }

    // Menampilkan booking yang baru
    public function new()
    {
        $newBookings = Booking::with('user')->where('Status', 'Pending')->get(); // Ambil booking yang belum diproses
        return view('admin.bookings.new', compact('newBookings'));
    }

    // Menampilkan booking yang disetujui
    public function approved()
{
    $approvedBookings = Booking::with('user')
        ->where('Status', 'Approved')
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan kolom created_at secara descending
        ->get();
    return view('admin.bookings.approve', compact('approvedBookings'));
}   

    // Menampilkan booking yang dibatalkan
    public function cancelled()
    {
        $cancelledBookings = Booking::with('user')->where('Status', 'Cancelled')->get(); // Ambil booking yang dibatalkan
        return view('admin.bookings.cancelled', compact('cancelledBookings'));
    }

    public function processed()
    {
        $processedBookings = Booking::with('user')->where('Status', 'On Process')->get(); // Ambil booking yang dikerjakan
        return view('admin.bookings.processed', compact('processedBookings'));
    }

    public function detail($id)
    {

        $booking = Booking::with(['user', 'service',])
            ->findOrFail($id);

        if (!$booking) {
            return redirect()->route('admin.bookings.new')->with('error', 'Booking not found.');
        }

        return view('admin.bookings.detail', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'remark' => 'required|string|max:255',
            'status' => 'required|string|in:Approved,Cancelled,On Process',
        ]);

        // Update status dan remark
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->remark = $request->remark;
        $booking->save();

        return redirect()->route('admin.bookings.detail', $id)->with('success', 'Booking updated successfully.');
    }

    public function filter()
    {
        return view('admin.booking.filtered', compact('bookings'));
    }


    public function filtered(Request $request)
    {

        $request->validate([
            'fromdate' => 'required|date',
            'todate' => 'required|date|after_or_equal:fromdate',
        ]);

        $bookings = Booking::whereBetween('booking_date', [$request->fromdate, $request->todate])->get();

        return view('admin.booking.filtered', compact('bookings'));
    }
}
