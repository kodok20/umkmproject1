<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $limit = $request->input('limit', 10);
        $produks = Produk::all();
        $query = Product::query();

        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $produks = $query->paginate($limit);
        
        return view('produk.index', compact('produks')); // Pastikan nama view sesuai
    }

    // Metode lainnya...
}
    // Metode lainnya...

