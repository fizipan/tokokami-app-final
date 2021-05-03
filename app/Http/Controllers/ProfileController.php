<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $provinces = Province::all();
        return view('pages.profile', compact('user', 'provinces'));
    }

    public function upload(Request $request, $id)
    {
        $data = $request->validate([
            'photo' => 'image',
        ]);

        $data['photo'] = $request->file('photo')->store('assets/profile', 'public');

        $user = User::findOrFail($id);

        $user->update($data);
        return redirect()->route('profile')
                            ->with('success', 'Photo profile anda berhasil diubah');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string',
            'postal_code' => 'required|integer',
            'provinces_id' => 'required|exists:provinces,id',
            'regencies_id' => 'required|exists:regencies,city_id',
            'address' => 'required|string',
        ]);

        $user = User::findOrFail($id);

        $user->update($data);
        return redirect()->route('profile')
                            ->with('success', 'Profile anda berhasil diubah');
    }
}
