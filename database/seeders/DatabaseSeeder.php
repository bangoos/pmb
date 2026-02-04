<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JalurPendaftaran;
use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin PMB',
            'email' => 'admin@umbk.ac.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $jalur = [
            ['nama' => 'Reguler', 'kode' => 'REG', 'diskon_spp' => 0, 'syarat_dokumen' => ['foto', 'ijazah', 'ktp'], 'urutan' => 1],
            ['nama' => 'KIP Kuliah', 'kode' => 'KIP', 'diskon_spp' => 100, 'syarat_dokumen' => ['foto', 'ijazah', 'ktp', 'kip'], 'urutan' => 2],
            ['nama' => 'Hafidz', 'kode' => 'HAF', 'diskon_spp' => 50, 'syarat_dokumen' => ['foto', 'ijazah', 'sertifikat_hafidz'], 'urutan' => 3],
            ['nama' => 'RPL', 'kode' => 'RPL', 'diskon_spp' => 0, 'syarat_dokumen' => ['foto', 'ijazah', 'sertifikat_kompetensi'], 'urutan' => 4],
        ];
        foreach ($jalur as $j) {
            JalurPendaftaran::create($j);
        }

        $prodi = [
            ['nama' => 'Teknik Informatika', 'kode' => 'TI', 'fakultas' => 'Teknik dan Komunikasi'],
            ['nama' => 'Ilmu Komunikasi', 'kode' => 'IK', 'fakultas' => 'Teknik dan Komunikasi'],
            ['nama' => 'Ekonomi Islam', 'kode' => 'EI', 'fakultas' => 'Ekonomi dan Bisnis'],
            ['nama' => 'Ekonomi Pembangunan', 'kode' => 'EP', 'fakultas' => 'Ekonomi dan Bisnis'],
            ['nama' => 'Akuntansi', 'kode' => 'AK', 'fakultas' => 'Ekonomi dan Bisnis'],
            ['nama' => 'Manajemen', 'kode' => 'MN', 'fakultas' => 'Ekonomi dan Bisnis'],
        ];
        foreach ($prodi as $p) {
            ProgramStudi::create($p);
        }
    }
}
