<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $subject ?? 'Notifikasi PMB UMBK' }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #A00000;">PMB UMBK</h2>
        <p>Hai {{ $name ?? 'Calon Mahasiswa' }},</p>
        <p>{{ $message ?? 'Ini adalah notifikasi dari sistem PMB UMBK.' }}</p>
        <p style="margin-top: 30px; font-size: 12px; color: #666;">
            Universitas Muhammadiyah Bekasi Karawang<br>
            Penerimaan Mahasiswa Baru
        </p>
    </div>
</body>
</html>
