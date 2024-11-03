<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\EventType;
use App\Models\Page;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Contact::all();
        return view('home', compact('reviews'));
    }

    public function service()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function about()
    {
        $page = Page::where('type', 'aboutus')->first();
        return view('about', compact('page'));
    }

    public function mail()
    {
        $page = Page::where('type', 'contactus')->first();
        return view('mail', compact('page'));
    }

    public function submit_mail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    public function filterByEventType($eventType)
    {
        // Ambil tipe acara dari database
        $eventType = EventType::where('type', $eventType)->firstOrFail();

        // Ambil layanan yang terkait dengan tipe acara tersebut
        $services = Service::where('event_type_id', $eventType->id)->get();

        // Kembalikan view dengan data layanan dan tipe acara
        return view('services_filter', compact('services', 'eventType'));
    }


}
