@extends('layouts.landing')

@section('title', 'Masuk - PMB UMBK')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <div style="max-width: 400px; margin: 0 auto; background: #fff; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 4px solid #A00000;">
        <h2 style="color: #A00000; margin-bottom: 24px; font-size: 1.5rem;">Masuk ke Akun PMB</h2>
        @if ($errors->any())
            <div style="background: #fee; color: #c00; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    style="width: 100%; padding: 10px 14px; border: 1px solid #ddd; border-radius: 8px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600;">Password</label>
                <input type="password" name="password" required
                    style="width: 100%; padding: 10px 14px; border: 1px solid #ddd; border-radius: 8px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label><input type="checkbox" name="remember"> Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px;">Masuk</button>
        </form>
        <p style="margin-top: 20px; text-align: center;">
            Belum punya akun? <a href="{{ route('register') }}" style="color: #A00000; font-weight: 600;">Daftar</a>
        </p>
    </div>
</div>
@endsection
