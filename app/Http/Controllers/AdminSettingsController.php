<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class AdminSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function system()
    {
        // Get system information
        $system = [
            'laravel_version' => app()->version(),
            'php_version' => PHP_VERSION,
            'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'database' => config('database.default'),
            'cache_driver' => config('cache.default'),
            'session_driver' => config('session.driver'),
            'environment' => config('app.env'),
            'debug_mode' => config('app.debug'),
            'timezone' => config('app.timezone'),
            'storage_link' => File::exists(public_path('storage')),
        ];

        return view('admin.settings.system', compact('system'));
    }

    public function pmb()
    {
        $settings = [
            'biaya_registrasi' => config('pmb.biaya_registrasi', 250000),
            'biaya_awal' => config('pmb.biaya_awal', 3000000),
            'midtrans_server_key' => config('services.midtrans.server_key'),
            'midtrans_client_key' => config('services.midtrans.client_key'),
            'midtrans_is_production' => config('services.midtrans.is_production', false),
            'wa_gateway_url' => config('services.wa.url'),
            'wa_gateway_token' => config('services.wa.token'),
        ];

        return view('admin.settings.pmb', compact('settings'));
    }

    public function updatePmb(Request $request)
    {
        $request->validate([
            'biaya_registrasi' => 'required|integer|min:0',
            'biaya_awal' => 'required|integer|min:0',
            'midtrans_server_key' => 'nullable|string',
            'midtrans_client_key' => 'nullable|string',
            'midtrans_is_production' => 'boolean',
            'wa_gateway_url' => 'nullable|url',
            'wa_gateway_token' => 'nullable|string',
        ]);

        // Update .env file
        $envFile = base_path('.env');
        $envContent = File::get($envFile);

        $envUpdates = [
            'PMB_BIAYA_REGISTRASI=' => $request->biaya_registrasi,
            'PMB_BIAYA_AWAL=' => $request->biaya_awal,
            'MIDTRANS_SERVER_KEY=' => $request->midtrans_server_key,
            'MIDTRANS_CLIENT_KEY=' => $request->midtrans_client_key,
            'MIDTRANS_IS_PRODUCTION=' => $request->midtrans_is_production ? 'true' : 'false',
            'WA_GATEWAY_URL=' => $request->wa_gateway_url,
            'WA_GATEWAY_TOKEN=' => $request->wa_gateway_token,
        ];

        foreach ($envUpdates as $key => $value) {
            $envContent = preg_replace("/^{$key}.*$/m", "{$key}{$value}", $envContent);
        }

        File::put($envFile, $envContent);

        return redirect()->back()
            ->with('success', 'Pengaturan PMB berhasil diperbarui');
    }

    public function maintenance()
    {
        return view('admin.settings.maintenance');
    }

    public function toggleMaintenance(Request $request)
    {
        $request->validate([
            'maintenance' => 'required|boolean',
            'message' => 'nullable|string|max:255',
        ]);

        if ($request->maintenance) {
            Artisan::call('down', [
                '--message' => $request->message ?? 'Sedang dalam pemeliharaan'
            ]);
        } else {
            Artisan::call('up');
        }

        return redirect()->back()
            ->with('success', 'Mode maintenance berhasil ' . ($request->maintenance ? 'diaktifkan' : 'dinonaktifkan'));
    }

    public function cache()
    {
        return view('admin.settings.cache');
    }

    public function clearCache(Request $request)
    {
        $request->validate([
            'cache_type' => 'required|array',
            'cache_type.*' => 'in:application,config,route,view,cache'
        ]);

        $cleared = [];

        if (in_array('application', $request->cache_type)) {
            Artisan::call('cache:clear');
            $cleared[] = 'Application Cache';
        }

        if (in_array('config', $request->cache_type)) {
            Artisan::call('config:clear');
            $cleared[] = 'Configuration Cache';
        }

        if (in_array('route', $request->cache_type)) {
            Artisan::call('route:clear');
            $cleared[] = 'Route Cache';
        }

        if (in_array('view', $request->cache_type)) {
            Artisan::call('view:clear');
            $cleared[] = 'View Cache';
        }

        if (in_array('cache', $request->cache_type)) {
            Artisan::call('cache:clear');
            $cleared[] = 'General Cache';
        }

        return redirect()->back()
            ->with('success', 'Cache berhasil dibersihkan: ' . implode(', ', $cleared));
    }

    public function backup()
    {
        return view('admin.settings.backup');
    }

    public function createBackup(Request $request)
    {
        $request->validate([
            'backup_type' => 'required|in:database,files,all'
        ]);

        try {
            $filename = 'backup_' . date('Y-m-d_H-i-s');

            switch ($request->backup_type) {
                case 'database':
                    Artisan::call('db:backup', [
                        '--filename' => $filename . '_database.sql'
                    ]);
                    break;
                case 'files':
                    Artisan::call('backup:run', [
                        '--only-files' => true,
                        '--filename' => $filename . '_files.zip'
                    ]);
                    break;
                case 'all':
                    Artisan::call('backup:run', [
                        '--filename' => $filename . '_full.zip'
                    ]);
                    break;
            }

            return redirect()->back()
                ->with('success', 'Backup berhasil dibuat');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal membuat backup: ' . $e->getMessage());
        }
    }

    public function logs()
    {
        $logFile = storage_path('logs/laravel.log');
        
        if (File::exists($logFile)) {
            $logs = File::get($logFile);
            $logLines = explode("\n", $logs);
            $logLines = array_slice($logLines, -100); // Last 100 lines
        } else {
            $logLines = ['Log file not found'];
        }

        return view('admin.settings.logs', compact('logLines'));
    }

    public function clearLogs()
    {
        $logFile = storage_path('logs/laravel.log');
        
        if (File::exists($logFile)) {
            File::put($logFile, '');
        }

        return redirect()->back()
            ->with('success', 'Log berhasil dibersihkan');
    }
}
