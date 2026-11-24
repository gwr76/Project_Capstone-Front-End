<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menghapus admin lama jika ada (biar tidak duplikat email)
        User::where('email', 'Admin@gmail.com')->delete();

        // Buat Akun Admin Otomatis dengan Password Terenkripsi
        User::create([
            'nama' => 'Admin',
            'email' => 'Admin@gmail.com',
            'no_telp' => '081234567890',
            'password' => Hash::make('Admin11223344'), // Otomatis ter-enkripsi Bcrypt
            'role' => 'admin',
        ]);
    }
}
