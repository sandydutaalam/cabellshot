<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use App\Models\Photographer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function index()
    {
        $event_types = EventType::all(); // Fetch all event types
        return view('admin.event-types.index', compact('event_types'));
    }

    public function create()
    {
        return view('admin.event-types.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required|string|max:255', // Validate event type
            ]);

            EventType::create([
                'type' => $request->type, // Store event type
            ]);

            return redirect()->route('admin.event-types.index')->with('success', 'Berhasil membuat Event Type!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat Event Type: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $eventType = EventType::findOrFail($id); // Find event type or fail
            $eventType->delete(); // Delete the event type

            return redirect()->route('admin.event-types.index')->with('success', 'Berhasil menghapus Event Type!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Event Type: ' . $e->getMessage());
        }
    }


    public function detail($id)
    {
        // Ambil event type beserta photographers yang sudah berelasi
        $event_type = EventType::with('photographers')->findOrFail($id);

        // Ambil semua user dengan role 'user' yang belum berelasi dengan event type ini
        $users = User::where('role', 'user')
            ->whereNotIn('id', $event_type->photographers->pluck('id')) // Hindari user yang sudah terelasi
            ->get();

        return view('admin.event-types.detail', compact('event_type', 'users'));
    }


    public function addPhotographer(Request $request, $id)
    {
        // $event_type = EventType::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required',
        ]);
        // check name and event_type_id if exists
        $photographer = Photographer::where('name', $request->name)
            ->where('event_type_id', $id)
            ->first();

        if ($photographer) {
            return redirect()->route('admin.event-types.detail', $id)
                ->with('error', 'Photographer already exists!');
        }


        Photographer::create([
            'name' => $request->name,
            'event_type_id' => $id,
        ]);

        return redirect()->route('admin.event-types.detail', $id)
            ->with('success', 'Photographer added successfully!');
    }

    public function removePhotographer($event_id, $id)
    {
        Photographer::findOrFail($id)->delete();


        return redirect()->route('admin.event-types.detail', $event_id)
            ->with('success', 'Photographer removed successfully!');
    }
}
