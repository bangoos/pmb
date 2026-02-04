@extends('layouts.landing')

@section('title', 'Bayar Biaya Tahap Awal - PMB UMBK')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <div style="max-width: 500px; margin: 0 auto;">
        <h2 style="color: #A00000; margin-bottom: 24px;">Pembayaran Biaya Tahap Awal</h2>
        <p style="margin-bottom: 20px;">Jumlah: <strong>Rp {{ number_format($amount, 0, ',', '.') }}</strong></p>
        @if(session('snap_token'))
            <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    window.snap.pay(@json(session('snap_token')), {
                        onSuccess: function() { window.location.href = @json(route('payment.awal.callback')); },
                        onPending: function() { window.location.href = @json(route('payment.awal.callback')); }
                    });
                });
            </script>
        @else
            <form method="POST" action="{{ route('payment.awal.create') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Bayar via Midtrans</button>
            </form>
        @endif
        <p style="margin-top: 20px;"><a href="{{ route('dashboard') }}" style="color: #A00000;">← Kembali</a></p>
    </div>
</div>
@endsection
