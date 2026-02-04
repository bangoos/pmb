<?php

namespace App\Http\Middleware;

use App\Models\Pendaftaran;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRegistrationPaid
{
    /**
     * Pay-to-Test: Hanya calon mahasiswa yang sudah bayar biaya registrasi yang bisa akses tes & dashboard penuh.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (! $user || $user->isAdmin()) {
            return $next($request);
        }

        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();
        if (! $pendaftaran) {
            return redirect()->route('dashboard')
                ->with('error', 'Silakan lengkapi data pendaftaran terlebih dahulu.');
        }

        $hasPaid = $user->payments()
            ->where('jenis', 'registrasi')
            ->whereIn('status', ['capture', 'settlement', 'pending'])
            ->exists();

        if (! $hasPaid) {
            return redirect()->route('payment.registration')
                ->with('error', 'Anda harus melunasi biaya registrasi terlebih dahulu untuk mengerjakan tes dan melanjutkan pendaftaran.');
        }

        $pendaftaran->update(['tahap' => Pendaftaran::TAHAP_PAID]);

        return $next($request);
    }
}
