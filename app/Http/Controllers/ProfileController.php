<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan daftar profile
    public function index()
    {
        $profiles = Profile::all(); // Ambil semua data profile
        return view('profiles.index', compact('profiles'));
    }

    // Menampilkan form untuk membuat profile baru
    public function create()
    {
        return view('profiles.create');
    }

    // Menyimpan profile baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:profiles,email',
            'phone' => 'nullable|string|max:20',
        ]);

        Profile::create($request->all()); // Simpan data profile
        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    // Menampilkan detail profile
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    // Menampilkan form untuk mengedit profile
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    // Mengupdate profile yang ada
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:profiles,email,' . $profile->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $profile->update($request->all()); // Perbarui data profile
        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    // Menghapus profile
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }
}
