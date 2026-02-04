<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $programs = [
            [
                'id' => 'teknik-informatika',
                'nama' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknik dan Komunikasi',
                'deskripsi' => 'Teknik Informatika adalah program studi yang mempelajari rekayasa perangkat lunak, jaringan komputer, kecerdasan buatan, dan pengembangan sistem informasi.',
                'visi' => 'Menjadi program studi unggulan dalam bidang teknologi informasi yang menghasilkan lulusan berkarakter Islami, profesional, dan berwawasan global.',
                'misi' => [
                    'Menyelenggarakan pendidikan berkualitas dalam bidang teknik informatika',
                    'Mengembangkan penelitian yang inovatif dan bermanfaat',
                    'Melakukan pengabdian kepada masyarakat berbasis teknologi',
                    'Membangun jaringan kerjasama dengan industri dan institusi'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Pengembangan perangkat lunak dan aplikasi',
                    'Analisis dan desain sistem informasi',
                    'Administrasi jaringan komputer',
                    'Keamanan siber dan data',
                    'Machine learning dan AI',
                    'Mobile dan web development'
                ],
                'prospek_kerja' => [
                    'Software Engineer/Developer',
                    'System Analyst',
                    'Network Administrator',
                    'Data Scientist',
                    'IT Consultant',
                    'Cyber Security Analyst',
                    'Mobile App Developer',
                    'Web Developer'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 400000,
                    'prakuliah' => 1500000,
                    'semester' => 3500000
                ],
                'fasilitas' => [
                    'Lab Komputer dengan 100+ unit',
                    'Lab Jaringan dan Keamanan Siber',
                    'High-speed internet access',
                    'Software development tools',
                    'Cloud computing platform',
                    'Collaborative workspace'
                ]
            ],
            [
                'id' => 'ilmu-komunikasi',
                'nama' => 'Ilmu Komunikasi',
                'fakultas' => 'Fakultas Teknik dan Komunikasi',
                'deskripsi' => 'Ilmu Komunikasi adalah program studi yang mengembangkan kemampuan komunikasi digital, jurnalistik, public relations, dan media production.',
                'visi' => 'Menjadi program studi terkemuka dalam bidang ilmu komunikasi yang menghasilkan praktisi media dan komunikasi profesional.',
                'misi' => [
                    'Menyelenggarakan pendidikan komunikasi yang berkualitas',
                    'Mengembangkan penelitian media dan komunikasi digital',
                    'Membangun hubungan masyarakat yang positif',
                    'Menciptakan konten media yang berkualitas'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Jurnalistik dan media writing',
                    'Public Relations dan komunikasi korporat',
                    'Digital marketing dan social media',
                    'Broadcasting dan media production',
                    'Photography dan videography',
                    'Content creation dan storytelling'
                ],
                'prospek_kerja' => [
                    'Journalist/Reporter',
                    'Public Relations Officer',
                    'Social Media Manager',
                    'Digital Marketing Specialist',
                    'Content Creator',
                    'Broadcast Producer',
                    'Corporate Communication',
                    'Media Planner'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'TV Studio dan production room',
                    'Radio studio',
                    'Photography studio',
                    'Editing suite',
                    'Media lab',
                    'Equipment rental service'
                ]
            ],
            [
                'id' => 'ekonomi-islam',
                'nama' => 'Ekonomi Islam',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Ekonomi Islam adalah program studi yang mempelajari sistem ekonomi berbasis syariah, perbankan syariah, dan keuangan Islam.',
                'visi' => 'Menjadi program studi unggul dalam bidang ekonomi Islam yang menghasilkan praktisi syariah yang profesional dan berkarakter.',
                'misi' => [
                    'Menyelenggarakan pendidikan ekonomi Islam berkualitas',
                    'Mengembangkan penelitian ekonomi syariah',
                    'Menerapkan prinsip ekonomi Islam dalam praktik',
                    'Membangun jaringan industri syariah'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Perbankan syariah dan lembaga keuangan',
                    'Investasi dan pasar modal syariah',
                    'Akuntansi syariah',
                    'Manajemen keuangan Islam',
                    'Ekonomi mikro dan makro syariah',
                    'Fikih muamalah dan hukum ekonomi Islam'
                ],
                'prospek_kerja' => [
                    'Bank Syariah Officer',
                    'Islamic Financial Advisor',
                    'Sharia Compliance Officer',
                    'Islamic Investment Analyst',
                    'Takaful Insurance Agent',
                    'Islamic Banking Consultant',
                    'Economic Researcher',
                    'Financial Planner'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Trading room',
                    'Financial lab',
                    'Sharia banking simulation',
                    'Digital library',
                    'Research center',
                    'Guest lecture series'
                ]
            ],
            [
                'id' => 'ekonomi-pembangunan',
                'nama' => 'Ekonomi Pembangunan',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Ekonomi Pembangunan adalah program studi yang fokus pada analisis kebijakan ekonomi dan perencanaan pembangunan.',
                'visi' => 'Menjadi program studi terkemuka dalam bidang ekonomi pembangunan yang menghasilkan analis kebijakan yang kompeten.',
                'misi' => [
                    'Menyelenggarakan pendidikan ekonomi pembangunan berkualitas',
                    'Mengembangkan penelitian kebijakan ekonomi',
                    'Menganalisis isu pembangunan terkini',
                    'Berkontribusi pada pembangunan nasional'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Analisis kebijakan ekonomi',
                    'Perencanaan pembangunan',
                    'Ekonometrika dan statistik ekonomi',
                    'Ekonomi regional dan urban',
                    'Ekonomi sumberdaya alam',
                    'Ekonomi publik dan fiskal'
                ],
                'prospek_kerja' => [
                    'Economic Planner',
                    'Policy Analyst',
                    'Development Economist',
                    'Government Economist',
                    'Research Officer',
                    'Budget Analyst',
                    'Regional Development Planner',
                    'Economic Consultant'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Economic research lab',
                    'Statistical analysis tools',
                    'Policy simulation software',
                    'Database access',
                    'Conference room',
                    'Research grants'
                ]
            ],
            [
                'id' => 'akuntansi',
                'nama' => 'Akuntansi',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Akuntansi adalah program studi yang menghasilkan akuntan profesional yang kompeten dalam bidang auditing, perpajakan, dan keuangan.',
                'visi' => 'Menjadi program studi unggul dalam bidang akuntansi yang menghasilkan akuntan profesional yang berkarakter Islami.',
                'misi' => [
                    'Menyelenggarakan pendidikan akuntansi berkualitas',
                    'Mengembangkan penelitian akuntansi dan auditing',
                    'Menerapkan standar akuntansi internasional',
                    'Membangun profesionalisme akuntan'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Financial accounting dan reporting',
                    'Auditing dan assurance',
                    'Perpajakan Indonesia',
                    'Manajerial accounting',
                    'Akuntansi biaya dan budgeting',
                    'Accounting information systems'
                ],
                'prospek_kerja' => [
                    'Public Accountant',
                    'Internal Auditor',
                    'Tax Consultant',
                    'Management Accountant',
                    'Financial Analyst',
                    'Budget Analyst',
                    'Accounting Manager',
                    'Compliance Officer'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Accounting lab',
                    'Tax research center',
                    'Audit simulation software',
                    'Financial database',
                    'Professional certification prep',
                    'Internship programs'
                ]
            ],
            [
                'id' => 'manajemen',
                'nama' => 'Manajemen',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Manajemen adalah program studi yang mencetak lulusan profesional di bidang bisnis, manajemen SDM, pemasaran, dan operasional.',
                'visi' => 'Menjadi program studi terkemuka dalam bidang manajemen yang menghasilkan pemimpin bisnis yang inovatif dan berkarakter.',
                'misi' => [
                    'Menyelenggarakan pendidikan manajemen berkualitas',
                    'Mengembangkan penelitian bisnis dan manajemen',
                    'Membangun jiwa entrepreneurship',
                    'Menciptakan pemimpin bisnis Islami'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Strategic management',
                    'Human resource management',
                    'Marketing management',
                    'Financial management',
                    'Operations management',
                    'Entrepreneurship dan business development'
                ],
                'prospek_kerja' => [
                    'Business Manager',
                    'HR Manager',
                    'Marketing Manager',
                    'Operations Manager',
                    'Business Analyst',
                    'Management Consultant',
                    'Project Manager',
                    'Entrepreneur'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Business simulation lab',
                    'Entrepreneurship center',
                    'Case study room',
                    'Business database',
                    'Startup incubator',
                    'Industry partnership'
                ]
            ],
            [
                'id' => 'psikologi',
                'nama' => 'Psikologi',
                'fakultas' => 'Fakultas Ilmu Sosial dan Humaniora',
                'deskripsi' => 'Psikologi adalah program studi yang mempelajari perilaku manusia, kesehatan mental, dan pengembangan potensi individu.',
                'visi' => 'Menjadi program studi unggul dalam bidang psikologi yang menghasilkan praktisi psikolog profesional dan berkarakter Islami.',
                'misi' => [
                    'Menyelenggarakan pendidikan psikologi berkualitas',
                    'Mengembangkan penelitian perilaku dan mental',
                    'Melayani konseling dan terapi',
                    'Membangun kesehatan mental masyarakat'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Psikologi klinis dan kesehatan mental',
                    'Psikologi industri dan organisasi',
                    'Psikologi pendidikan',
                    'Assessment dan tes psikologi',
                    'Konseling dan terapi',
                    'Psikologi perkembangan'
                ],
                'prospek_kerja' => [
                    'Clinical Psychologist',
                    'Industrial/Organizational Psychologist',
                    'Counselor',
                    'HR Development Specialist',
                    'Educational Psychologist',
                    'Research Psychologist',
                    'Mental Health Advocate',
                    'Therapist'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 400000,
                    'prakuliah' => 1500000,
                    'semester' => 3500000
                ],
                'fasilitas' => [
                    'Counseling center',
                    'Psychology testing lab',
                    'Observation room',
                    'Therapy room',
                    'Psychological assessment tools',
                    'Community service programs'
                ]
            ]
        ];

        return view('program-studi.index', compact('programs'));
    }

    public function show($id)
    {
        $programs = [
            'teknik-informatika' => [
                'id' => 'teknik-informatika',
                'nama' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Teknik dan Komunikasi',
                'deskripsi' => 'Teknik Informatika adalah program studi yang mempelajari rekayasa perangkat lunak, jaringan komputer, kecerdasan buatan, dan pengembangan sistem informasi.',
                'visi' => 'Menjadi program studi unggulan dalam bidang teknologi informasi yang menghasilkan lulusan berkarakter Islami, profesional, dan berwawasan global.',
                'misi' => [
                    'Menyelenggarakan pendidikan berkualitas dalam bidang teknik informatika',
                    'Mengembangkan penelitian yang inovatif dan bermanfaat',
                    'Melakukan pengabdian kepada masyarakat berbasis teknologi',
                    'Membangun jaringan kerjasama dengan industri dan institusi'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Pengembangan perangkat lunak dan aplikasi',
                    'Analisis dan desain sistem informasi',
                    'Administrasi jaringan komputer',
                    'Keamanan siber dan data',
                    'Machine learning dan AI',
                    'Mobile dan web development'
                ],
                'prospek_kerja' => [
                    'Software Engineer/Developer',
                    'System Analyst',
                    'Network Administrator',
                    'Data Scientist',
                    'IT Consultant',
                    'Cyber Security Analyst',
                    'Mobile App Developer',
                    'Web Developer'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 400000,
                    'prakuliah' => 1500000,
                    'semester' => 3500000
                ],
                'fasilitas' => [
                    'Lab Komputer dengan 100+ unit',
                    'Lab Jaringan dan Keamanan Siber',
                    'High-speed internet access',
                    'Software development tools',
                    'Cloud computing platform',
                    'Collaborative workspace'
                ]
            ],
            'ilmu-komunikasi' => [
                'id' => 'ilmu-komunikasi',
                'nama' => 'Ilmu Komunikasi',
                'fakultas' => 'Fakultas Teknik dan Komunikasi',
                'deskripsi' => 'Ilmu Komunikasi adalah program studi yang mengembangkan kemampuan komunikasi digital, jurnalistik, public relations, dan media production.',
                'visi' => 'Menjadi program studi terkemuka dalam bidang ilmu komunikasi yang menghasilkan praktisi media dan komunikasi profesional.',
                'misi' => [
                    'Menyelenggarakan pendidikan komunikasi yang berkualitas',
                    'Mengembangkan penelitian media dan komunikasi digital',
                    'Membangun hubungan masyarakat yang positif',
                    'Menciptakan konten media yang berkualitas'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Jurnalistik dan media writing',
                    'Public Relations dan komunikasi korporat',
                    'Digital marketing dan social media',
                    'Broadcasting dan media production',
                    'Photography dan videography',
                    'Content creation dan storytelling'
                ],
                'prospek_kerja' => [
                    'Journalist/Reporter',
                    'Public Relations Officer',
                    'Social Media Manager',
                    'Digital Marketing Specialist',
                    'Content Creator',
                    'Broadcast Producer',
                    'Corporate Communication',
                    'Media Planner'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'TV Studio dan production room',
                    'Radio studio',
                    'Photography studio',
                    'Editing suite',
                    'Media lab',
                    'Equipment rental service'
                ]
            ],
            'ekonomi-islam' => [
                'id' => 'ekonomi-islam',
                'nama' => 'Ekonomi Islam',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Ekonomi Islam adalah program studi yang mempelajari sistem ekonomi berbasis syariah, perbankan syariah, dan keuangan Islam.',
                'visi' => 'Menjadi program studi unggul dalam bidang ekonomi Islam yang menghasilkan praktisi syariah yang profesional dan berkarakter.',
                'misi' => [
                    'Menyelenggarakan pendidikan ekonomi Islam berkualitas',
                    'Mengembangkan penelitian ekonomi syariah',
                    'Menerapkan prinsip ekonomi Islam dalam praktik',
                    'Membangun jaringan industri syariah'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Perbankan syariah dan lembaga keuangan',
                    'Investasi dan pasar modal syariah',
                    'Akuntansi syariah',
                    'Manajemen keuangan Islam',
                    'Ekonomi mikro dan makro syariah',
                    'Fikih muamalah dan hukum ekonomi Islam'
                ],
                'prospek_kerja' => [
                    'Bank Syariah Officer',
                    'Islamic Financial Advisor',
                    'Sharia Compliance Officer',
                    'Islamic Investment Analyst',
                    'Takaful Insurance Agent',
                    'Islamic Banking Consultant',
                    'Economic Researcher',
                    'Financial Planner'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Trading room',
                    'Financial lab',
                    'Sharia banking simulation',
                    'Digital library',
                    'Research center',
                    'Guest lecture series'
                ]
            ],
            'ekonomi-pembangunan' => [
                'id' => 'ekonomi-pembangunan',
                'nama' => 'Ekonomi Pembangunan',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Ekonomi Pembangunan adalah program studi yang fokus pada analisis kebijakan ekonomi dan perencanaan pembangunan.',
                'visi' => 'Menjadi program studi terkemuka dalam bidang ekonomi pembangunan yang menghasilkan analis kebijakan yang kompeten.',
                'misi' => [
                    'Menyelenggarakan pendidikan ekonomi pembangunan berkualitas',
                    'Mengembangkan penelitian kebijakan ekonomi',
                    'Menganalisis isu pembangunan terkini',
                    'Berkontribusi pada pembangunan nasional'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Analisis kebijakan ekonomi',
                    'Perencanaan pembangunan',
                    'Ekonometrika dan statistik ekonomi',
                    'Ekonomi regional dan urban',
                    'Ekonomi sumberdaya alam',
                    'Ekonomi publik dan fiskal'
                ],
                'prospek_kerja' => [
                    'Economic Planner',
                    'Policy Analyst',
                    'Development Economist',
                    'Government Economist',
                    'Research Officer',
                    'Budget Analyst',
                    'Regional Development Planner',
                    'Economic Consultant'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Economic research lab',
                    'Statistical analysis tools',
                    'Policy simulation software',
                    'Database access',
                    'Conference room',
                    'Research grants'
                ]
            ],
            'akuntansi' => [
                'id' => 'akuntansi',
                'nama' => 'Akuntansi',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Akuntansi adalah program studi yang menghasilkan akuntan profesional yang kompeten dalam bidang auditing, perpajakan, dan keuangan.',
                'visi' => 'Menjadi program studi unggul dalam bidang akuntansi yang menghasilkan akuntan profesional yang berkarakter Islami.',
                'misi' => [
                    'Menyelenggarakan pendidikan akuntansi berkualitas',
                    'Mengembangkan penelitian akuntansi dan auditing',
                    'Menerapkan standar akuntansi internasional',
                    'Membangun profesionalisme akuntan'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Financial accounting dan reporting',
                    'Auditing dan assurance',
                    'Perpajakan Indonesia',
                    'Manajerial accounting',
                    'Akuntansi biaya dan budgeting',
                    'Accounting information systems'
                ],
                'prospek_kerja' => [
                    'Public Accountant',
                    'Internal Auditor',
                    'Tax Consultant',
                    'Management Accountant',
                    'Financial Analyst',
                    'Budget Analyst',
                    'Accounting Manager',
                    'Compliance Officer'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Accounting lab',
                    'Tax research center',
                    'Audit simulation software',
                    'Financial database',
                    'Professional certification prep',
                    'Internship programs'
                ]
            ],
            'manajemen' => [
                'id' => 'manajemen',
                'nama' => 'Manajemen',
                'fakultas' => 'Fakultas Ekonomi dan Bisnis',
                'deskripsi' => 'Manajemen adalah program studi yang mencetak lulusan profesional di bidang bisnis, manajemen SDM, pemasaran, dan operasional.',
                'visi' => 'Menjadi program studi terkemuka dalam bidang manajemen yang menghasilkan pemimpin bisnis yang inovatif dan berkarakter.',
                'misi' => [
                    'Menyelenggarakan pendidikan manajemen berkualitas',
                    'Mengembangkan penelitian bisnis dan manajemen',
                    'Membangun jiwa entrepreneurship',
                    'Menciptakan pemimpin bisnis Islami'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Strategic management',
                    'Human resource management',
                    'Marketing management',
                    'Financial management',
                    'Operations management',
                    'Entrepreneurship dan business development'
                ],
                'prospek_kerja' => [
                    'Business Manager',
                    'HR Manager',
                    'Marketing Manager',
                    'Operations Manager',
                    'Business Analyst',
                    'Management Consultant',
                    'Project Manager',
                    'Entrepreneur'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 350000,
                    'prakuliah' => 1500000,
                    'semester' => 3200000
                ],
                'fasilitas' => [
                    'Business simulation lab',
                    'Entrepreneurship center',
                    'Case study room',
                    'Business database',
                    'Startup incubator',
                    'Industry partnership'
                ]
            ],
            'psikologi' => [
                'id' => 'psikologi',
                'nama' => 'Psikologi',
                'fakultas' => 'Fakultas Ilmu Sosial dan Humaniora',
                'deskripsi' => 'Psikologi adalah program studi yang mempelajari perilaku manusia, kesehatan mental, dan pengembangan potensi individu.',
                'visi' => 'Menjadi program studi unggul dalam bidang psikologi yang menghasilkan praktisi psikolog profesional dan berkarakter Islami.',
                'misi' => [
                    'Menyelenggarakan pendidikan psikologi berkualitas',
                    'Mengembangkan penelitian perilaku dan mental',
                    'Melayani konseling dan terapi',
                    'Membangun kesehatan mental masyarakat'
                ],
                'akreditasi' => 'BAIK',
                'jenjang' => 'S1 (Strata 1)',
                'durasi' => '8 Semester (4 Tahun)',
                'kompetensi' => [
                    'Psikologi klinis dan kesehatan mental',
                    'Psikologi industri dan organisasi',
                    'Psikologi pendidikan',
                    'Assessment dan tes psikologi',
                    'Konseling dan terapi',
                    'Psikologi perkembangan'
                ],
                'prospek_kerja' => [
                    'Clinical Psychologist',
                    'Industrial/Organizational Psychologist',
                    'Counselor',
                    'HR Development Specialist',
                    'Educational Psychologist',
                    'Research Psychologist',
                    'Mental Health Advocate',
                    'Therapist'
                ],
                'biaya' => [
                    'registrasi' => 250000,
                    'spp_per_bulan' => 400000,
                    'prakuliah' => 1500000,
                    'semester' => 3500000
                ],
                'fasilitas' => [
                    'Counseling center',
                    'Psychology testing lab',
                    'Observation room',
                    'Therapy room',
                    'Psychological assessment tools',
                    'Community service programs'
                ]
            ]
        ];

        $program = $programs[$id] ?? null;

        if (!$program) {
            abort(404);
        }

        return view('program-studi.show', compact('program'));
    }
}
