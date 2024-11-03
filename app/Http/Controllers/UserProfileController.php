<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    // Fungsi untuk menampilkan profil pengguna
    public function profile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:14',
        ]);


        $user->update([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    // Menampilkan form untuk mengganti password
    public function showChangePasswordForm()
    {
        return view('auth.change-password'); // Ganti dengan nama view yang Anda pilih
    }

    // Mengganti password
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
