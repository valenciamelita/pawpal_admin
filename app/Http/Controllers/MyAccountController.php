<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class MyAccountController extends Controller
{
    public function view()
    {
        $alluser = User::get();
        return view ("my-account", compact('alluser'));
    }

    public function accountDetails()
    {
        // Cek apakah USER_ID ada di cookie
        $userId = Cookie::get('user');

        // Jika tidak ada di cookie, ambil dari session
        if (!$userId) {
            $user = Session::get('user');

            // Jika tidak ada user di session, redirect ke halaman login atau lakukan tindakan lain
            if (!$user) {
                return redirect()->route('login.submit')->withErrors(['error' => 'Please log in to access your account details.']);
            }

            $userId = $user->USER_ID;
        }

        // Retrieve user from database
        $user = DB::table('USERS')->where('USER_ID', $userId)->first();

        // Cek apakah user ditemukan
        if (!$user) {
            return redirect()->route('login.submit')->withErrors(['error' => 'User not found.']);
        }

        // Kirim data user ke view
        // return view('my-account', ['user' => $user]);

        // dd($userId);
        // dd($user->USER_NAME);
        return view('my-account', ['user' => $user]);
    }

    public function saveUser(Request $request)
    {
        // Validasi data
        $request->validate([
            'first-name' => 'required|string|max:255',
            'email-name' => 'required|email|max:255',
            'user-password' => 'required|string|min:8',
        ]);

        // Cek apakah USER_ID ada di cookie
        $userId = Cookie::get('user');

        // Jika tidak ada di cookie, ambil dari session
        if (!$userId) {
            $user = Session::get('user');

            // Jika tidak ada user di session, redirect ke halaman login atau lakukan tindakan lain
            if (!$user) {
                return redirect()->route('login.submit')->withErrors(['error' => 'Please log in to update your account details.']);
            }

            $userId = $user->USER_ID;
        }

        $hashedPassword = hash('sha256', $request->input('user-password'));

        if ($user->USER_PASSWORD == $request->input('user-password')) {
             // Jika password sama, gunakan password yang sudah ada dalam database
             $passwordini = $user->USER_PASSWORD;
        } else {
            // Jika password berbeda, gunakan hash password baru
             $passwordini = $hashedPassword;
        }


        // Update data pengguna di database
        DB::table('USERS')
            ->where('USER_ID', $userId)
            ->update([
                'USER_NAME' => $request->input('first-name'),
                'USER_EMAIL' => $request->input('email-name'),
                'USER_PASSWORD' => $passwordini
        ]);

        // Redirect atau kirim respon balik
        return redirect()->back()->with('success', 'User updated successfully');
    }
}
