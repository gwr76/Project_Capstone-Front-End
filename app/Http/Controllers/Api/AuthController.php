<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Penjual;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_user',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan pada data input',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       
        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password salah'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

    public function logout(Request $request)
    {
        
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil! Token telah dihapus.'
        ], 200);
    }

    public function index() // atau getAllUsers
    {
        $users = User::all(); 

        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
    }

    public function update(Request $request, $id)
    {
    
        $user = \App\Models\User::where('id_user', $id)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data user tidak ditemukan!'
            ], 404);
        }
        if ($request->has('nama')) {
            $user->nama = $request->nama;
        }
        

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Data user berhasil diupdate!',
            'data' => $user
        ], 200);
    }

    public function destroy($id)
    {
        $user = \App\Models\User::where('id_user', $id)->first();

  
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data user tidak ditemukan!'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data user berhasil dihapus!'
        ], 200);
    }

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
}