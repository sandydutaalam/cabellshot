<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\EventType;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Service;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;


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

    public function view($id)
    {
        
        $user = Auth::user();
        $booking = Booking::with('user', 'service')
            ->where('user_id', $user->id)
            ->where('id', $id)
            ->first(); // Ambil booking yang sesuai

        if (!$booking) {
            return redirect()->route('booking.history')->with('error', 'Booking not found.');
        }

        return view('booking.view', compact('booking'));
    }

    // public function view_pdf($id)
    // {
    //     $user = Auth::user();
    //     $booking = Booking::with('user', 'service')
    //         ->where('user_id', $user->id)
    //         ->where('id', $id)
    //         ->first();
    
    //     if (!$booking) {
    //         return redirect()->route('booking.history')->with('error', 'Booking not found.');
    //     }
    
    //     $mpdf = new \Mpdf\Mpdf();
    //     $html = view('booking.view_pdf', compact('booking'))->render();
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output();
    // }



    public function create($service_id)
    {
        // $eventTypes = EventType::all();


        $service = Service::findOrFail($service_id);  // Ensure valid service is retrieved or fail gracefully
        $event_type = $service->event;
        // dd($event_type);
        // get photographer by event type
        $photographers = $event_type->photographers;

        // $payment_proof_types = Payment::distinct()->pluck('payment_proof_type','id'); // Mengambil data unik

        return view('booking.create', compact('photographers',  'service', ));
    }


    public function store(Request $request, $service_id)
    {
        $request->validate([
            'booking_date' => 'required|date',
            // 'event_type_id' => 'required|integer|exists:event_types,id',
            'photographer_id' => 'required|integer',
            'number_of_guest' => 'required|integer',
            'message' => 'required|string',
            // 'payment_proof_type' => 'required|string', 
            'payment_proof' => 'required|mimes:jpeg,jpg,png,pdf|max:2048'
        ]);

        // Cek jumlah pemesanan fotografer hari ini
        $todayBookings = Booking::where('photographer_id', $request->photographer_id)
            ->whereDate('booking_date', Carbon::today())
            ->count();

        if ($todayBookings >= 4) {
        return back()->withErrors(['photographer' => 'Fotografer sudah mencapai batas pemesanan hari ini.']);
        }

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
            // 'payment_proof_type' => $request->input('$payment_proof_type'),
            'message' => $request->message,
            'payment_proof' => $paymentProofPath,
            'status' => 'Pending'
        ]);

        // dd(vars: $request->all());


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
