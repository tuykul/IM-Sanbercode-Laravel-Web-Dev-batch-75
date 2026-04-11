<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('profile');
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        );

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
