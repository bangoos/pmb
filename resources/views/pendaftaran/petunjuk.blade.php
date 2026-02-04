@extends('layouts.landing')

@section('title', 'Petunjuk Pendaftaran - PMB UMBK')

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background: #A00000; padding: 40px 0; text-align: center; color: white;">
        <div class="container">
            <h1 style="font-size: 2.5rem; font-weight: 700;">Petunjuk Pendaftaran</h1>
            <p>Panduan lengkap pendaftaran mahasiswa baru Universitas Muhammadiyah Bekasi Karawang</p>
        </div>
    </section>

    <!-- Petunjuk Content -->
    <section class="petunjuk-section" style="padding: 60px 0; background: #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="petunjuk-content">
                        <h2>Tahapan Pendaftaran</h2>
                        
                        <div class="step-item">
                            <h3><span class="step-number">1</span> Persiapan Dokumen</h3>
                            <p>Siapkan dokumen-dokumen berikut:</p>
                            <ul>
                                <li>Pas foto terbaru (warna, ukuran 3x4 cm)</li>
                                <li>Fotokopi ijazah/SKL SMA/SMK/MA yang telah dilegalisir</li>
                                <li>Fotokopi rapor semester 1-5 yang telah dilegalisir</li>
                                <li>Fotokopi KTP/KK/Akte Kelahiran</li>
                                <li>Sertifikat prestasi (jika ada)</li>
                                <li>Surat keterangan sehat dari dokter</li>
                            </ul>
                        </div>

                        <div class="step-item">
                            <h3><span class="step-number">2</span> Pendaftaran Online</h3>
                            <p>Lakukan pendaftaran melalui website resmi PMB UMBK:</p>
                            <ol>
                                <li>Kunjungi <a href="{{ route('landing') }}">pmb.umbk.ac.id</a></li>
                                <li>Klik tombol "Daftar Sekarang"</li>
                                <li>Isi formulir pendaftaran dengan data yang lengkap dan benar</li>
                                <li>Upload dokumen-dokumen yang telah disiapkan</li>
                                <li>Periksa kembali data yang diisi</li>
                                <li>Submit formulir pendaftaran</li>
                            </ol>
                        </div>

                        <div class="step-item">
                            <h3><span class="step-number">3</span> Pembayaran Biaya Pendaftaran</h3>
                            <p>Lakukan pembayaran biaya pendaftaran sebesar Rp 300.000:</p>
                            <ul>
                                <li>Transfer ke rekening Bank BNI: 123-456-7890 a.n. Universitas Muhammadiyah Bekasi Karawang</li>
                                <li>Upload bukti pembayaran ke sistem PMB</li>
                                <li>Simpan bukti pembayaran untuk arsip</li>
                            </ul>
                        </div>

                        <div class="step-item">
                            <h3><span class="step-number">4</span> Tes Seleksi</h3>
                            <p>Ikuti tes seleksi yang telah ditentukan:</p>
                            <ul>
                                <li>Tes akan dilaksanakan secara online/offline sesuai jadwal</li>
                                <li>Materi tes: Tes Potensi Akademik, Tes Bahasa Inggris, dan Tes Wawancara</li>
                                <li>Informasi detail tes akan dikirim melalui email/SMS</li>
                                <li>Siapkan perangkat (laptop/komputer) dengan koneksi internet stabil untuk tes online</li>
                            </ul>
                        </div>

                        <div class="step-item">
                            <h3><span class="step-number">5</span> Pengumuman Hasil</h3>
                            <p>Pengumuman hasil seleksi dapat dilihat melalui:</p>
                            <ul>
                                <li>Website PMB UMBK dengan memasukkan nomor pendaftaran</li>
                                <li>Email yang terdaftar</li>
                                <li>SMS notifikasi</li>
                            </ul>
                        </div>

                        <div class="step-item">
                            <h3><span class="step-number">6</span> Registrasi Ulang</h3>
                            <p>Bagi calon mahasiswa yang diterima:</p>
                            <ul>
                                <li>Lakukan registrasi ulang sesuai jadwal yang ditentukan</li>
                                <li>Upload dokumen asli untuk verifikasi</li>
                                <li>Lakukan pembayaran biaya kuliah semester pertama</li>
                                <li>Ambil bukti penerimaan mahasiswa baru</li>
                            </ul>
                        </div>

                        <div class="important-note">
                            <h3>⚠️ Penting!</h3>
                            <ul>
                                <li>Pastikan semua data yang diisi adalah benar dan dapat dipertanggungjawabkan</li>
                                <li>Dokumen yang diupload harus jelas dan dapat dibaca</li>
                                <li>Keputusan panitia penerimaan mahasiswa baru tidak dapat diganggu gugat</li>
                                <li>Waspadai penipuan yang mengatasnamakan UMBK</li>
                                <li>Untuk informasi lebih lanjut, hubungi Admin PMB</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="sidebar-info">
                        <div class="info-card">
                            <h4>Informasi Kontak</h4>
                            <ul>
                                <li><i class="fas fa-phone"></i> (+62) 813 9566 247</li>
                                <li><i class="fas fa-phone"></i> (+62) 878 6389 5222</li>
                                <li><i class="fas fa-envelope"></i> pmb@umbk.ac.id</li>
                                <li><i class="fas fa-globe"></i> pmb.umbk.ac.id</li>
                            </ul>
                        </div>
                        
                        <div class="info-card">
                            <h4>Jadwal Pendaftaran</h4>
                            <ul>
                                <li><strong>Gelombang 1:</strong> 1 Des - 31 Mar</li>
                                <li><strong>Gelombang 2:</strong> 1 Apr - 30 Jun</li>
                                <li><strong>Gelombang 3:</strong> 1 Jul - 30 Sep</li>
                            </ul>
                        </div>

                        <div class="cta-card">
                            <h4>Daftar Sekarang</h4>
                            <p>Jangan lewatkan kesempatan kuliah di UMBK!</p>
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .step-item {
            background: white;
            padding: 30px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border-left: 5px solid #A00000;
        }

        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: #A00000;
            color: white;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            margin-right: 15px;
            font-weight: bold;
        }

        .step-item h3 {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #A00000;
        }

        .step-item ul, .step-item ol {
            margin-left: 55px;
        }

        .step-item li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .important-note {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .important-note h3 {
            color: #856404;
            margin-bottom: 15px;
        }

        .important-note ul {
            margin-left: 20px;
        }

        .sidebar-info {
            position: sticky;
            top: 20px;
        }

        .info-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .info-card h4 {
            color: #A00000;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .info-card ul {
            list-style: none;
            padding: 0;
        }

        .info-card li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .info-card i {
            margin-right: 10px;
            color: #A00000;
            width: 20px;
        }

        .cta-card {
            background: #A00000;
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }

        .cta-card h4 {
            color: white;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            margin-bottom: 15px;
        }

        .btn-block {
            display: block;
            width: 100%;
            text-align: center;
        }
    </style>
@endsection
