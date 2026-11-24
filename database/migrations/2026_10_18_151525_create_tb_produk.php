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
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_akungame');
            $table->unsignedBigInteger('id_penjual');
            $table->unsignedBigInteger('id_kategori');
            $table->decimal('harga', 15, 2);
            $table->text('deskripsi');
            $table->text('detail_akun')->nullable();
            $table->enum('status', ['Tersedia', 'Menunggu Validasi', 'Terjual'])->default('Menunggu Validasi');
            $table->timestamps();

            $table->foreign('id_penjual')->references('id_user')->on('tb_user')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_produk');
    }
};