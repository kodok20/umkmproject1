<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'umkms';

    protected $fillable = [
        'nama_umkm',
        'nib',
        'tahun_berdiri',
        'nomor_telepon',
        'email',
        'alamat_usaha',
        'jenis_usaha',
        'kategori_usaha',
        'skala',
        'lokasi',
        'legalitas',
        'teknologi',
        'pembiayaan',
        'kemitraan',
        'id_pemilik',
        'status',
        'tantangan',
        'foto',
        'platform',
    ];
}
