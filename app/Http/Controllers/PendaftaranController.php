<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function petunjuk()
    {
        return view('pendaftaran.petunjuk');
    }

    public function biaya()
    {
        return view('pendaftaran.biaya');
    }

    public function jalurReguler()
    {
        return view('pendaftaran.jalur-reguler');
    }

    public function jalurKelasKaryawan()
    {
        return view('pendaftaran.jalur-kelas-karyawan');
    }

    public function jalurRPL()
    {
        return view('pendaftaran.jalur-rpl');
    }
}
