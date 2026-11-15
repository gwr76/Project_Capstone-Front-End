<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_akungame';

    protected $fillable = [
        'id_penjual',
        'id_kategori',
        'harga',
        'deskripsi',
        'detail_akun',
        'status'
    ];

    // Sembunyikan detail akun (username/pass) dari response API umum
    protected $hidden = ['detail_akun'];

    // Relasi ke Penjual (User)
    public function penjual()
    {
        return $this->belongsTo(User::class, 'id_penjual', 'id_user');
    }

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}