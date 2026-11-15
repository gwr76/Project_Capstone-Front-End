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
        Schema::create('tb_pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->unsignedBigInteger('id_pembeli');
            $table->unsignedBigInteger('id_akungame');
            $table->decimal('total_harga', 15, 2);
            $table->enum('status_pesanan', ['Menunggu Pembayaran', 'Diproses', 'Dibatalkan'])->default('Menunggu Pembayaran');
            $table->timestamps();

            $table->foreign('id_pembeli')->references('id_user')->on('tb_user')->onDelete('cascade');
            $table->foreign('id_akungame')->references('id_akungame')->on('tb_produk')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pesanan');
    }
};
