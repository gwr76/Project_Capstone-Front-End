<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::create('tb_penjual', function (Blueprint $table) {
            $table->id('id_penjual');
            $table->unsignedBigInteger('id_user'); 
            $table->string('nik', 16)->unique();
            $table->string('nama_toko')->unique();
            $table->string('no_telp_wa', 15);
            $table->string('no_ewallet', 30);
            $table->string('nama_ewallet'); 
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->enum('status_pengajuan', ['Menunggu Validasi', 'Disetujui', 'Ditolak'])->default('Menunggu Validasi');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('tb_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_penjual');
    }
};