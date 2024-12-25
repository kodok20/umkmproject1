<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UMKM;

class UMKMController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Daftar UMKM'; 
        $search = $request->input('search');
        $limit = $request->input('limit', 10);

        $query = UMKM::query();

        if ($search) {
            $query->where('nama_umkm', 'like', "%{$search}%")
                  ->orWhere('kategori_usaha', 'like', "%{$search}%");
        }

        $umkm = $query->paginate($limit);

        return view('umkm.index', compact('umkm', 'title'));
    }

    public function create()
    {
        $title = 'Tambah UMKM Baru';
        return view('umkm.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required|max:255',
            'nib' => 'nullable|max:255',
            'tahun_berdiri' => 'required|date_format:Y',
            'nomor_telepon' => 'required|max:15',
            'email' => 'required|email|max:50',
            'alamat_usaha' => 'required|max:255',
            'jenis_usaha' => 'required|max:50',
            'kategori_usaha' => 'required|max:75',
            'skala' => 'nullable',
            'lokasi' => 'nullable',
            'legalitas' => 'nullable',
            'teknologi' => 'nullable',
            'pembiayaan' => 'nullable',
            'kemitraan' => 'nullable',
            'id_pemilik' => 'required',
            'status' => 'nullable',
            'tantangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'platform' => 'nullable',
        ]);

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('public/images');
            $validatedData['foto'] = $imagePath;
        }

        UMKM::create($validatedData);

        return redirect()->route('umkm.index');
    }

    public function show(UMKM $umkm)
    {
        return view('umkm.show', compact('umkm'));
    }

    public function edit(UMKM $umkm)
    {
        return view('umkm.edit', compact('umkm'));
    }

    public function update(Request $request, UMKM $umkm)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required|max:255',
            'nib' => 'nullable|max:255',
            'tahun_berdiri' => 'required|date_format:Y',
            'nomor_telepon' => 'required|max:15',
            'email' => 'required|email|max:50',
            'alamat_usaha' => 'required|max:255',
            'jenis_usaha' => 'required|max:50',
            'kategori_usaha' => 'required|max:75',
            'skala' => 'nullable',
            'lokasi' => 'nullable',
            'legalitas' => 'nullable',
            'teknologi' => 'nullable',
            'pembiayaan' => 'nullable',
            'kemitraan' => 'nullable',
            'id_pemilik' => 'required',
            'status' => 'nullable',
            'tantangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'platform' => 'nullable',
        ]);

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('public/images');
            $validatedData['foto'] = $imagePath;
        }

        $umkm->update($validatedData);

        return redirect()->route('umkm.index');
    }

    public function destroy(UMKM $umkm)
    {
        $umkm->delete();
        return redirect()->route('umkm.index');
    }
    public function dashboard() {
        $user = auth()->user();
        if ($user->peran === 'admin') {
            return view('admin.dashboard');
        } elseif ($user->peran === 'pemilik') {
            return view('pemilik.dashboard');
        } else {
            return view('investor.dashboard');
        }
    }
    
    // Update dan Delete bisa ditambahkan serupa.
}
