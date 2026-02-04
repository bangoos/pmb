<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayInterface;
use App\Contracts\NotificationChannelInterface;
use App\Models\Payment;
use App\Models\Pendaftaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentGatewayInterface $payment,
        protected NotificationChannelInterface $notification
    ) {}

    public function registration(Request $request): View|RedirectResponse
    {
        $user = $request->user();
        $paid = $user->payments()->where('jenis', Payment::JENIS_REGISTRASI)->whereIn('status', ['capture', 'settlement'])->exists();
        if ($paid) {
            return redirect()->route('dashboard')->with('info', 'Anda sudah melunasi biaya registrasi.');
        }

        $pending = $user->payments()->where('jenis', Payment::JENIS_REGISTRASI)->where('status', 'pending')->first();
        $amount = (float) config('pmb.biaya_registrasi', 250000);

        return view('payment.registration', [
            'user' => $user,
            'pendingPayment' => $pending,
            'amount' => $amount,
        ]);
    }

    public function createRegistrationPayment(Request $request): RedirectResponse
    {
        $user = $request->user();
        $amount = (float) config('pmb.biaya_registrasi', 250000);
        $orderId = 'REG-' . $user->id . '-' . time() . '-' . Str::random(4);

        $payment = Payment::create([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'jenis' => Payment::JENIS_REGISTRASI,
            'jumlah' => $amount,
            'status' => 'pending',
        ]);

        $token = $this->payment->createPayment($payment, [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? '',
        ]);

        $payment->update(['snap_token' => $token]);

        return redirect()->route('payment.registration')->with('snap_token', $token);
    }

    public function registrationCallback(Request $request): RedirectResponse
    {
        return redirect()->route('dashboard')->with('success', 'Pembayaran berhasil. Anda dapat mengerjakan tes online.');
    }

    public function notification(Request $request): \Illuminate\Http\Response
    {
        $orderId = $request->input('order_id');
        $payment = Payment::where('order_id', $orderId)->first();
        if (! $payment) {
            return response('Order not found', 404);
        }

        $status = $this->payment->getTransactionStatus($orderId);
        $transactionStatus = $status['transaction_status'] ?? null;
        $payment->update([
            'status' => $transactionStatus,
            'transaction_id' => $status['transaction_id'] ?? null,
            'paid_at' => in_array($transactionStatus, ['capture', 'settlement']) ? now() : null,
            'metadata' => $status,
        ]);

        if (in_array($transactionStatus, ['capture', 'settlement'])) {
            $payment->user->pendaftaran?->update(['tahap' => Pendaftaran::TAHAP_PAID]);
            $this->notification->sendWhatsApp(
                $payment->user->phone ?? '',
                "Pembayaran {$payment->jenis} PMB UMBK Anda telah berhasil. Silakan login dan lanjutkan tes online: " . route('login')
            );
        }

        return response('OK', 200);
    }

    public function awal(Request $request): View|RedirectResponse
    {
        $user = $request->user();
        $pendaftaran = $user->pendaftaran;
        if (! $pendaftaran || $pendaftaran->tahap < Pendaftaran::TAHAP_ACCEPTED) {
            return redirect()->route('dashboard')->with('error', 'Anda belum dapat melakukan pembayaran tahap awal.');
        }

        $paid = $user->payments()->where('jenis', Payment::JENIS_AWAL)->whereIn('status', ['capture', 'settlement'])->exists();
        if ($paid) {
            return redirect()->route('dashboard')->with('info', 'Anda sudah melunasi biaya tahap awal.');
        }

        $amount = (float) config('pmb.biaya_awal', 3000000);
        return view('payment.awal', ['user' => $user, 'amount' => $amount]);
    }

    public function createAwalPayment(Request $request): RedirectResponse
    {
        $user = $request->user();
        $amount = (float) config('pmb.biaya_awal', 3000000);
        $orderId = 'AWAL-' . $user->id . '-' . time() . '-' . Str::random(4);

        $payment = Payment::create([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'jenis' => Payment::JENIS_AWAL,
            'jumlah' => $amount,
            'status' => 'pending',
        ]);

        $token = $this->payment->createPayment($payment, [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? '',
        ]);
        $payment->update(['snap_token' => $token]);

        return redirect()->route('payment.awal')->with('snap_token', $token);
    }

    public function awalCallback(Request $request): RedirectResponse
    {
        return redirect()->route('dashboard')->with('success', 'Pembayaran tahap awal berhasil. NIM akan diinformasikan via WA/Email.');
    }
}
