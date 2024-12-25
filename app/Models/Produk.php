<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $produks = Produk::where('nama', 'LIKE', "%$search%")
                          ->orWhereHas('umkm', function($query) use ($search) {
                              $query->where('nama_umkm', 'LIKE', "%$search%");
                          })->get();
        return view('produk.index', compact('produks'));
    }
   
}
