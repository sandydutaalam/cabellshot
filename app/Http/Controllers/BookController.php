<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\EventType;
use App\Models\Review;
use App\Models\Service;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{

    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function history()
    {
        $user = Auth::user();
        $bookings = $user->bookings; // Pastikan relasi ini ada dan benar

        return view('booking.history', compact('bookings'));
    }

    public function view($bookingid)
    {
        $user = Auth::user();
        $booking = Booking::with('user', 'service')
            ->where('user_id', $user->id)
            ->where('id', $bookingid)
            ->first(); // Ambil booking yang sesuai

        if (!$booking) {
            return redirect()->route('booking.history')->with('error', 'Booking not found.');
        }

        return view('booking.view', compact('booking'));
    }



    public function create($service_id)
    {
        // $eventTypes = EventType::all();


        $service = Service::findOrFail($service_id);  // Ensure valid service is retrieved or fail gracefully
        $event_type = $service->event;
        // dd($event_type);
        // get photographer by event type
        $photographers = $event_type->photographers;

        return view('booking.create', compact('photographers',  'service'));
    }


    public function store(Request $request, $service_id)
    {
        $request->validate([
            'booking_date' => 'required|date',
            // 'event_type_id' => 'required|integer|exists:event_types,id',
            'photographer_id' => 'required|integer',
            'number_of_guest' => 'required|integer',
            'message' => 'required|string',
            'payment_proof' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
        ]);

        $service = Service::findOrFail($service_id);  // Ensure valid service is retrieved or fail gracefully
        // Handle file upload using FileService
        $paymentProofPath = null;

        if ($request->hasFile('payment_proof')) {
            $paymentProofPath = $this->fileService->uploadFile($request->file('payment_proof'));
        }

        // Insert booking data into the database
        Booking::create([
            'booking_number' => mt_rand(100000000, 999999999),
            'service_id' => $service_id,
            'user_id' => Auth::id(),
            'photographer_id' => $request->photographer_id,
            'booking_date' => $request->booking_date,
            'event_type_id' => $service->event_type_id,
            'number_of_guest' => $request->number_of_guest,

            'message' => $request->message,
            'payment_proof' => $paymentProofPath,
            'status' => 'Pending'
        ]);

        return redirect()->route('booking.history')->with('success', 'Your booking has been placed successfully.');
    }

    public function review(Request $request, $bookingid)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $booking = Booking::findOrFail($bookingid);

        if ($booking->is_reviewed) {
            return redirect()->back()->with('error', 'You have already reviewed this booking.');
        }

        $booking->is_reviewed = true;
        $booking->save();

        Review::create([
            'booking_id' => $bookingid,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted successfully.');
    }
}
