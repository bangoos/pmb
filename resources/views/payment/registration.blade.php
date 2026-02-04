@extends('layouts.landing')

@section('title', 'Bayar Biaya Registrasi - PMB UMBK')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <div style="max-width: 500px; margin: 0 auto;">
        <h2 style="color: #A00000; margin-bottom: 24px;">Pembayaran Biaya Registrasi</h2>
        @if (session('error'))
            <div style="background: #f8d7da; color: #721c24; padding: 14px; border-radius: 8px; margin-bottom: 20px;">{{ session('error') }}</div>
        @endif
        <p style="margin-bottom: 20px;">Jumlah yang harus dibayar: <strong>Rp {{ number_format($amount, 0, ',', '.') }}</strong></p>
        @if(session('snap_token'))
            <div id="snap-container"></div>
            <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const token = @json(session('snap_token'));
                    if (token) {
                        window.snap.pay(token, {
                            onSuccess: function() { window.location.href = @json(route('payment.registration.callback')); },
                            onPending: function() { window.location.href = @json(route('payment.registration.callback')); },
                            onError: function() { alert('Pembayaran gagal.'); }
                        });
                    }
                });
            </script>
        @else
            <form method="POST" action="{{ route('payment.registration.create') }}">
                @csrf
                <button type="submit" class="btn btn-primary" style="padding: 12px 24px;">Bayar via Midtrans</button>
            </form>
        @endif
        <p style="margin-top: 20px;"><a href="{{ route('dashboard') }}" style="color: #A00000;">← Kembali ke Dashboard</a></p>
    </div>
</div>
@endsection
