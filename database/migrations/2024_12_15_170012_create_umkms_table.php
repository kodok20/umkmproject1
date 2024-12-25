<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmsTable extends Migration
{
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id('id_umkm');
            $table->string('nama_umkm');
            $table->string('nib')->nullable();
            $table->year('tahun_berdiri');
            $table->string('nomor_telepon', 15);
            $table->string('email', 50);
            $table->string('alamat_usaha');
            $table->string('jenis_usaha', 50);
            $table->string('kategori_usaha', 75);
            $table->string('skala')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('legalitas')->nullable();
            $table->string('teknologi')->nullable();
            $table->string('pembiayaan')->nullable();
            $table->string('kemitraan')->nullable();
            $table->unsignedBigInteger('id_pemilik');
            $table->string('status')->nullable();
            $table->text('tantangan')->nullable();
            $table->string('foto')->nullable();
            $table->string('platform')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umkms');
    }
}
