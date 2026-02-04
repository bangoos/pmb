<?php

return [
    'biaya_registrasi' => env('PMB_BIAYA_REGISTRASI', 250000),
    'biaya_awal' => env('PMB_BIAYA_AWAL', 3000000),
    'tahap' => [
        1 => 'Terdaftar',
        2 => 'Sudah Bayar Registrasi',
        3 => 'Tes Selesai',
        4 => 'Biodata & Dokumen',
        5 => 'Diterima',
        6 => 'Daftar Ulang (NIM)',
    ],
];
