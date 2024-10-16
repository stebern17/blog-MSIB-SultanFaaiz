<?php

// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show($id)
    {
        // Ambil data profil berdasarkan ID
        $profile = Profile::findOrFail($id);
        
        return view('profile.show', compact('profile'));
    }
}


