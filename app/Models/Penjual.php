<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;

    protected $table = 'tb_penjual';
    protected $primaryKey = 'id_penjual';
    
    protected $fillable = [
        'id_user',
        'nik',
        'nama_toko',
        'no_telp_wa',
        'no_ewallet',
        'nama_ewallet',
        'foto_ktp',
        'foto_kk',
        'status_pengajuan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}