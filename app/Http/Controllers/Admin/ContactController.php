<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function unread()
    {
        $unreadContacts = Contact::where('is_read', false)->get();

        return view('admin.contact-query.unread', compact('unreadContacts'));
    }
    public function read()
    {
        $readContacts = Contact::where('is_read', true)->get();

        return view('admin.contact-query.read', compact('readContacts'));
    }

    public function view($id)
    {
        $query = Contact::findOrFail($id);
        $query->update(['is_read' => true]);

        return view('admin.contact-query.view', compact('query'));
    }

}
