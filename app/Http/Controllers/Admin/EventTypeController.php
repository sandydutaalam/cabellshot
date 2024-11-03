<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventType;
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
        $event_type = EventType::findOrFail($id);

        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Tambahkan photographer ke event type
        $event_type->photographers()->attach($request->input('user_id'));

        return redirect()->route('admin.event-types.detail', $id)
            ->with('success', 'Photographer added successfully!');
    }

    public function removePhotographer($event_type_id, $user_id)
    {
        $event_type = EventType::findOrFail($event_type_id);

        // Hapus photographer dari event type
        $event_type->photographers()->detach($user_id);

        return redirect()->route('admin.event-types.detail', $event_type_id)
            ->with('success', 'Photographer removed successfully!');
    }
}
