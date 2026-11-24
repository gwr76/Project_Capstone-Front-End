<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjual;
use Illuminate\Support\Facades\Storage; 

class PenjualController extends Controller
{
    public function pengajuanPenjual(Request $request)
    {
        $user = auth()->user();
        $cekPengajuan = Penjual::where('id_user', $user->id_user)->first();
        if ($cekPengajuan) {
            return response()->json(['success' => false, 'message' => 'Anda sudah melakukan pengajuan!'], 400);
        }

        $request->validate([
            'nik' => 'required|string|min:16|max:16|unique:tb_penjual,nik',
            'nama_toko' => 'required|string|max:100|unique:tb_penjual,nama_toko',
            'no_telp_wa' => 'required|string|max:15',
            'no_ewallet' => 'required|string|max:30',
            'nama_ewallet' => 'required|string|max:100',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'foto_kk' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $ktpPath = null;
        $kkPath = null;

        if ($request->hasFile('foto_ktp')) {
            $ktpPath = $request->file('foto_ktp')->store('dokumen_penjual/ktp', 'public');
        }
        
        if ($request->hasFile('foto_kk')) {
            $kkPath = $request->file('foto_kk')->store('dokumen_penjual/kk', 'public');
        }


        $penjual = new Penjual();
        $penjual->id_user = $user->id_user;
        $penjual->nik = $request->nik;
        $penjual->nama_toko = $request->nama_toko;
        $penjual->no_telp_wa = $request->no_telp_wa;
        $penjual->no_ewallet = $request->no_ewallet;
        $penjual->nama_ewallet = $request->nama_ewallet;
        $penjual->foto_ktp = $ktpPath;
        $penjual->foto_kk = $kkPath;
        $penjual->status_pengajuan = 'Menunggu Validasi';
        $penjual->save();

        $user->role = 'calon_penjual';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan berhasil dikirim! Menunggu verifikasi admin.',
            'data' => $penjual
        ], 201);
    }

    public function rejectPenjual($id)
    {
        $penjual = \App\Models\Penjual::where('id_penjual', $id)->first();

        if (!$penjual) {
            return response()->json([
                'success' => false,
                'message' => 'Data pengajuan penjual tidak ditemukan!'
            ], 404);
        }

        $penjual->status_pengajuan = 'Ditolak'; 
        $penjual->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan penjual berhasil ditolak!',
            'data' => $penjual
        ], 200);
    }
}
