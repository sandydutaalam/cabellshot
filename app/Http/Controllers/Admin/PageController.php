<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::where('type', 'aboutus')->first(); // Fetch the About Us page
        return view('admin.pages.about', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('type', 'contactus')->first(); // Fetch the Contact Us page
        return view('admin.pages.contact', compact('page'));
    }

    public function update_about(Request $request)
    {
        $request->validate([
            'pagetitle' => 'required|string|max:255',
            'pagedes' => 'required|string',
        ]);

        $page = Page::where('type', 'aboutus')->first();
        $page->title = $request->pagetitle;
        $page->description = $request->pagedes;
        $page->save();

        return redirect()->route('admin.pages.about')->with('success', 'About Us page updated successfully!');
    }

    public function update_contact(Request $request)
    {
        $request->validate([
            'pagetitle' => 'required|string|max:255',
            'email' => 'required|email',
            'mobnum' => 'required|string|max:10',
            'pagedes' => 'required|string',
        ]);

        $page = Page::where('type', 'contactus')->first();
        $page->title = $request->pagetitle;
        $page->email = $request->email;
        $page->phone_number = $request->mobnum;
        $page->description = $request->pagedes;
        $page->save();

        return redirect()->route('admin.pages.contact')->with('success', 'Contact Us page updated successfully!');
    }
}
