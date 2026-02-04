<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $pendaftaran = $user->pendaftaran;

        return view('dashboard.index', [
            'user' => $user,
            'pendaftaran' => $pendaftaran,
            'tahap' => $pendaftaran ? (int) $pendaftaran->tahap : 1,
        ]);
    }
}
