<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class PhotograperController extends Controller
{
    public function getUserByEventType($event_type_id)
    {
        // Dapatkan event type berdasarkan id
        $eventType = EventType::find($event_type_id);

        // Ambil semua photographers yang terkait dengan event type ini
        $photographers = $eventType->photographers()->get();

        // Kembalikan data dalam format JSON
        return response()->json($photographers);
    }
}
