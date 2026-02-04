<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminTestController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\ProgramStudiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// About Route
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about.index');

// Beasiswa Routes
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa.index');
Route::get('/beasiswa/{type}', [BeasiswaController::class, 'show'])->name('beasiswa.show');

// Program Studi Routes
Route::get('/program-studi', [ProgramStudiController::class, 'index'])->name('program-studi.index');
Route::get('/program-studi/{id}', [ProgramStudiController::class, 'show'])->name('program-studi.show');

// Pendaftaran Routes
Route::get('/petunjuk-pendaftaran', [PendaftaranController::class, 'petunjuk'])->name('pendaftaran.petunjuk');
Route::get('/biaya-perkuliahan', [PendaftaranController::class, 'biaya'])->name('pendaftaran.biaya');
Route::get('/jalur-pendaftaran-reguler', [PendaftaranController::class, 'jalurReguler'])->name('pendaftaran.reguler');
Route::get('/jalur-pendaftaran-kelas-karyawan', [PendaftaranController::class, 'jalurKelasKaryawan'])->name('pendaftaran.kelas-karyawan');
Route::get('/jalur-pendaftaran-rpl', [PendaftaranController::class, 'jalurRPL'])->name('pendaftaran.rpl');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/payment/registration', [PaymentController::class, 'registration'])->name('payment.registration');
    Route::post('/payment/registration/create', [PaymentController::class, 'createRegistrationPayment'])->name('payment.registration.create');
    Route::get('/payment/registration/callback', [PaymentController::class, 'registrationCallback'])->name('payment.registration.callback');
    Route::get('/payment/awal', [PaymentController::class, 'awal'])->name('payment.awal');
    Route::post('/payment/awal/create', [PaymentController::class, 'createAwalPayment'])->name('payment.awal.create');
    Route::get('/payment/awal/callback', [PaymentController::class, 'awalCallback'])->name('payment.awal.callback');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pendaftar', [AdminDashboardController::class, 'pendaftarList'])->name('admin.pendaftar.index');
    Route::get('/admin/pendaftar/{id}', [AdminDashboardController::class, 'showPendaftar'])->name('admin.pendaftar.show');
    Route::post('/admin/pendaftar/{id}/status', [AdminDashboardController::class, 'updateStatus'])->name('admin.pendaftar.update-status');
    
    // Payment Management
    Route::get('/admin/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/admin/payments/{id}', [AdminPaymentController::class, 'show'])->name('admin.payments.show');
    Route::post('/admin/payments/{id}/status', [AdminPaymentController::class, 'updateStatus'])->name('admin.payments.update-status');
    Route::get('/admin/payments/export', [AdminPaymentController::class, 'export'])->name('admin.payments.export');
    
    // Test Management
    Route::get('/admin/tests', [AdminTestController::class, 'index'])->name('admin.tests.index');
    Route::get('/admin/tests/create', [AdminTestController::class, 'create'])->name('admin.tests.create');
    Route::post('/admin/tests', [AdminTestController::class, 'store'])->name('admin.tests.store');
    Route::get('/admin/tests/{id}', [AdminTestController::class, 'show'])->name('admin.tests.show');
    Route::get('/admin/tests/{id}/edit', [AdminTestController::class, 'edit'])->name('admin.tests.edit');
    Route::put('/admin/tests/{id}', [AdminTestController::class, 'update'])->name('admin.tests.update');
    Route::delete('/admin/tests/{id}', [AdminTestController::class, 'destroy'])->name('admin.tests.destroy');
    Route::get('/admin/tests/results', [AdminTestController::class, 'results'])->name('admin.tests.results');
    Route::post('/admin/tests/import', [AdminTestController::class, 'import'])->name('admin.tests.import');
    Route::get('/admin/tests/export', [AdminTestController::class, 'export'])->name('admin.tests.export');
    
    // Reports
    Route::get('/admin/reports', [AdminReportController::class, 'index'])->name('admin.reports');
    Route::get('/admin/reports/pendaftar', [AdminReportController::class, 'pendaftarReport'])->name('admin.reports.pendaftar');
    Route::get('/admin/reports/payment', [AdminReportController::class, 'paymentReport'])->name('admin.reports.payment');
    Route::get('/admin/reports/statistics', [AdminReportController::class, 'statisticsReport'])->name('admin.reports.statistics');
    Route::get('/admin/reports/export/pendaftar', [AdminReportController::class, 'exportPendaftar'])->name('admin.reports.export.pendaftar');
    Route::get('/admin/reports/export/payment', [AdminReportController::class, 'exportPayment'])->name('admin.reports.export.payment');
    
    // Settings
    Route::get('/admin/settings', [AdminSettingsController::class, 'index'])->name('admin.settings');
    Route::get('/admin/settings/system', [AdminSettingsController::class, 'system'])->name('admin.settings.system');
    Route::get('/admin/settings/pmb', [AdminSettingsController::class, 'pmb'])->name('admin.settings.pmb');
    Route::post('/admin/settings/pmb', [AdminSettingsController::class, 'updatePmb'])->name('admin.settings.update-pmb');
    Route::get('/admin/settings/maintenance', [AdminSettingsController::class, 'maintenance'])->name('admin.settings.maintenance');
    Route::post('/admin/settings/maintenance', [AdminSettingsController::class, 'toggleMaintenance'])->name('admin.settings.toggle-maintenance');
    Route::get('/admin/settings/cache', [AdminSettingsController::class, 'cache'])->name('admin.settings.cache');
    Route::post('/admin/settings/cache', [AdminSettingsController::class, 'clearCache'])->name('admin.settings.clear-cache');
    Route::get('/admin/settings/backup', [AdminSettingsController::class, 'backup'])->name('admin.settings.backup');
    Route::post('/admin/settings/backup', [AdminSettingsController::class, 'createBackup'])->name('admin.settings.create-backup');
    Route::get('/admin/settings/logs', [AdminSettingsController::class, 'logs'])->name('admin.settings.logs');
    Route::post('/admin/settings/logs', [AdminSettingsController::class, 'clearLogs'])->name('admin.settings.clear-logs');
});

Route::get('/payment/notification', [PaymentController::class, 'notification'])->name('payment.notification');

Route::get('/tes', fn () => redirect()->route('dashboard'))->name('tes.index');
Route::get('/biodata', fn () => redirect()->route('dashboard'))->name('biodata.edit');
