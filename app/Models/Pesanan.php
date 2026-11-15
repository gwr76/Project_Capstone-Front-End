<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'tb_pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'id_pembeli',
        'id_akungame',
        'total_harga',
        'status_pesanan'
    ];

    // Relasi ke Pembeli (User)
    public function pembeli()
    {
        return $this->belongsTo(User::class, 'id_pembeli', 'id_user');
    }

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_akungame', 'id_akungame');
    }
}