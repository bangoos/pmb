<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\User;
use App\Contracts\NotificationChannelInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct(
        protected NotificationChannelInterface $notification
    ) {}

    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => 'camaba',
        ]);

        Pendaftaran::create([
            'user_id' => $user->id,
            'tahap' => Pendaftaran::TAHAP_REGISTERED,
        ]);

        event(new Registered($user));

        $this->notification->notifyUser(
            $user->email,
            $user->phone,
            'Registrasi PMB UMBK',
            "Hai {$user->name}, akun PMB UMBK Anda telah dibuat. Silakan login dan lunasi biaya registrasi untuk mengerjakan tes online. Login: " . route('login'),
            ['name' => $user->name, 'message' => 'Silakan login dan lunasi biaya registrasi.']
        );

        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Registrasi berhasil. Silakan lunasi biaya registrasi untuk melanjutkan.');
    }
}
