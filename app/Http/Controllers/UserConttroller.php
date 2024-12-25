<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserConttroller extends Controller
{
    public function index() {
        $umkms = UMKM::all();
        return view('umkm.index', compact('umkms'));
    }
}
