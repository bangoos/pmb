# Sistem Informasi PMB UMBK

Sistem Penerimaan Mahasiswa Baru (PMB) Universitas Muhammadiyah Bekasi Karawang — Laravel 11 + Filament v3.

## Persyaratan

- PHP 8.2+
- Composer
- MySQL 8+
- Node.js (opsional, untuk asset build)

## Instalasi

### 1. Install dependensi

```bash
cd umbk
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Konfigurasi environment

Edit `.env`:

- **Database**: `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- **Midtrans**: `MIDTRANS_SERVER_KEY`, `MIDTRANS_CLIENT_KEY` (dari dashboard Midtrans)
- **WA Gateway**: `WA_GATEWAY_TOKEN` (Fonnte/Wablas)
- **PMB**: `PMB_BIAYA_REGISTRASI`, `PMB_BIAYA_AWAL` (opsional)

### 3. Aset dari design (landing page)

Salin file dari folder design PMB ke `public/`:

- **CSS**: dari `pmb/style.css` → `public/css/style.css` (sudah ada versi ringkas)
- **JS**: dari `pmb/js/script.js` → `public/js/script.js` (sudah ada)
- **Gambar**: dari `pmb/assets/images/*` → `public/images/`
  - logo.png, hero1.png, hero2.png, building.png, alur-pendaftaran.png, qr-code.png, mitra.png

Contoh (PowerShell):

```powershell
Copy-Item "C:\Users\Admin\Documents\trae_projects\pmb\assets\images\*" "public\images\" -Force
```

### 4. Database & Filament

```bash
php artisan migrate
php artisan db:seed
php artisan filament:install --panels
```

Login admin Filament: **/admin**  
Default seeder: `admin@umbk.ac.id` / `password` (ubah di production).

## Alur Pendaftaran (6 Tahap)

1. **Terdaftar** — Guest daftar akun, dapat email/WA.
2. **Sudah Bayar Registrasi** — Bayar via Midtrans Snap, lalu bisa tes.
3. **Tes Selesai** — Mengerjakan tes online (middleware Pay-to-Test).
4. **Biodata & Dokumen** — Isi biodata + unggah dokumen sesuai jalur.
5. **Diterima** — Admin verifikasi di Filament, notifikasi kelulusan via WA.
6. **Daftar Ulang (NIM)** — Bayar tahap awal via Midtrans, dapat NIM.

## Struktur Penting

- **Landing**: `resources/views/landing/`, `resources/views/layouts/landing.blade.php` (slicing dari index.html dengan `asset()`)
- **Service**: `App\Services\MidtransPaymentService`, `App\Services\WaGatewayNotificationService` (ganti provider lewat interface)
- **Middleware**: `EnsureRegistrationPaid` (Pay-to-Test), `EnsureUserHasRole` (RBAC)
- **Filament Admin**: `/admin` — Verifikasi Pendaftar, Bank Soal Tes, Laporan Pembayaran
- **Dashboard Maba**: Progress bar tahap 1–6 di `/dashboard`

## Keamanan

- RBAC: role `admin` / `camaba`
- Hanya admin yang bisa akses panel Filament
- CSRF: route webhook Midtrans (`payment/notification`) dikecualikan di `bootstrap/app.php`
- Password di-hash (bawaan Laravel), data sensitif bisa di-enkrip tambahan

## Deploy (Hostinger Cloud, PHP 8.2, MySQL)

- Set document root ke `public/`
- Set `APP_ENV=production`, `APP_DEBUG=false`
- Jalankan `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache`
- Atur cron untuk queue: `* * * * * php path/to/artisan schedule:run`
- Midtrans: set notification URL ke `https://domain Anda/payment/notification`

## Lisensi

MIT.
