<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile.index', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        // Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'phone_number' => 'required|string|max:14',
        ]);

        // Update
        $admin->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function showChangePasswordForm()
    {
        return view('admin.profile.change-password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'currentpassword' => 'required|string',
            'newpassword' => 'required|string|confirmed',
        ]);

        $user = User::find(Auth::id());
        if (Hash::check($request->currentpassword, $user->password)) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    }
}
