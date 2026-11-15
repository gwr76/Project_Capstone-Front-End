<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_pesanan',
        'bukti_pembayaran',
        'status_transaksi',
        'id_admin'
    ];

    // Relasi ke Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    // Relasi ke Admin (User)
    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin', 'id_user');
    }
}