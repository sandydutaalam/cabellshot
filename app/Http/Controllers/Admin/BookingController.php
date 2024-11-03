<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan semua booking
    public function all()
    {
        $allBookings = Booking::with('user')->get(); // Ambil semua booking dengan data user
        return view('admin.bookings.all', compact('allBookings'));
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
        $approvedBookings = Booking::with('user')->where('Status', 'Approved')->get(); // Ambil booking yang disetujui
        return view('admin.bookings.approve', compact('approvedBookings'));
    }

    // Menampilkan booking yang dibatalkan
    public function cancelled()
    {
        $cancelledBookings = Booking::with('user')->where('Status', 'Cancelled')->get(); // Ambil booking yang dibatalkan
        return view('admin.bookings.cancelled', compact('cancelledBookings'));
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
            'status' => 'required|string|in:Approved,Cancelled',
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
