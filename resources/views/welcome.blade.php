<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 1 Probolinggo | Volleyball Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #5a0e1b;
            --blue: #d91f26;
            --light: #fff1f2;
            --gold: #f4b942;
            --dark: #420b15;
            --text: #1f2a37;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(180deg, #fff7f7 0%, #fdf1f2 100%);
            color: var(--text);
        }

        .topbar {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(148,163,184,0.18);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            color: var(--navy);
            letter-spacing: 0.02em;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--navy), var(--blue));
            color: white;
            box-shadow: 0 12px 24px rgba(29, 111, 214, 0.2);
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #6d0d18 0%, #d91f26 100%);
            border: none;
            border-radius: 999px;
            padding: 0.8rem 1.3rem;
            font-weight: 700;
            box-shadow: 0 12px 24px rgba(217, 31, 38, 0.2);
        }

        .btn-outline-custom {
            border: 1px solid rgba(18,60,105,0.15);
            border-radius: 999px;
            color: var(--navy);
            background: rgba(255,255,255,0.7);
            padding: 0.8rem 1.2rem;
            font-weight: 600;
        }

        .hero {
            padding: 72px 0 40px;
        }

        .hero h1 {
            font-size: clamp(2.4rem, 4vw, 4.4rem);
            font-weight: 800;
            color: var(--navy);
            line-height: 1.08;
        }

        .hero p {
            font-size: 1.08rem;
            color: #475569;
            line-height: 1.8;
            max-width: 640px;
        }

        .hero-card {
            background: linear-gradient(135deg, rgba(77, 15, 24, 0.98), rgba(217, 31, 38, 0.92));
            border-radius: 1.8rem;
            padding: 28px;
            color: white;
            box-shadow: 0 24px 48px rgba(77, 15, 24, 0.12);
            position: relative;
            overflow: hidden;
        }

        .hero-card::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            right: -24px;
            bottom: -20px;
        }

        .mini-stat {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 1rem;
            padding: 1rem 1.1rem;
        }

        .section {
            padding: 36px 0;
        }

        .section-title {
            font-size: clamp(1.8rem, 2.5vw, 2.6rem);
            font-weight: 800;
            color: var(--navy);
            margin-bottom: 0.8rem;
        }

        .feature-card, .role-card {
            background: rgba(255,255,255,0.9);
            border: 1px solid rgba(148,163,184,0.14);
            border-radius: 1.2rem;
            box-shadow: 0 16px 32px rgba(15,23,42,0.07);
            padding: 1.5rem;
            height: 100%;
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--light);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .role-card.admin { background: linear-gradient(135deg, #fff5f6, #fff0f1); }
        .role-card.coach { background: linear-gradient(135deg, #fff8f8, #fff2f2); }
        .role-card.member { background: linear-gradient(135deg, #fffaf8, #fff1f3); }

        .badge-soft {
            display: inline-block;
            border-radius: 999px;
            padding: 0.35rem 0.7rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.03em;
        }

        .badge-soft.admin { background: #ffe7ea; color: #5a0e1b; }
        .badge-soft.coach { background: #ffe9ed; color: #7a1019; }
        .badge-soft.member { background: #ffe5e9; color: #7a1019; }

        .demo-box {
            background: linear-gradient(135deg, #5a0e1b, #d91f26);
            color: white;
            border-radius: 1.4rem;
            padding: 1.7rem;
            box-shadow: 0 22px 42px rgba(90,14,27,0.22);
        }

        .footer {
            padding: 24px 0 40px;
            color: #64748b;
        }

        @media (max-width: 991px) {
            .hero {
                padding-top: 48px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg topbar">
        <div class="container py-3">
            <a href="{{ route('home') }}" class="brand text-decoration-none">
                <img src="/images/smkn1-logo.svg" alt="SMKN 1 Probolinggo" style="width: 42px; height: 42px; border-radius: 12px;">
                <span>SMKN 1 <span class="text-primary">Probolinggo</span></span>
            </a>

            <div class="d-flex align-items-center gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary-custom text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-custom">Masuk</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7">
                        <span class="badge-soft admin mb-3">SCHOOL SPORTS MANAGEMENT</span>
                        <h1>Sistem manajemen ekstrakurikuler bola voli sekolah.</h1>
                        <p>
                            SMKN 1 Probolinggo menggunakan platform ini untuk mengelola jadwal latihan, absensi, evaluasi pemain, dan ranking perkembangan atlet dengan lebih modern, tertib, dan profesional.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary-custom text-white">Ke Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary-custom text-white">Masuk ke Sistem</a>
                                @endauth
                            @endif
                            <a href="#features" class="btn btn-outline-custom">Lihat Fitur</a>
                        </div>

                        <div class="row mt-5 g-3">
                            <div class="col-md-4">
                                <div class="mini-stat">
                                    <div class="text-muted small">Role</div>
                                    <div class="fw-bold fs-5 mt-1">3 Akses</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-stat">
                                    <div class="text-muted small">Fitur</div>
                                    <div class="fw-bold fs-5 mt-1">5+ Modul</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mini-stat">
                                    <div class="text-muted small">Tampilan</div>
                                    <div class="fw-bold fs-5 mt-1">School Ready</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="hero-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <div class="small text-white-50">Overview</div>
                                    <h4 class="mb-0 mt-1">Program Voli Sekolah</h4>
                                </div>
                                <span class="badge-soft admin">LIVE</span>
                            </div>

                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="mini-stat">
                                        <div class="small text-white-50">Total User</div>
                                        <div class="fw-bold fs-4 mt-2">12</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mini-stat">
                                        <div class="small text-white-50">Jadwal</div>
                                        <div class="fw-bold fs-4 mt-2">08</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mini-stat">
                                        <div class="small text-white-50">Absensi</div>
                                        <div class="fw-bold fs-4 mt-2">96%</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mini-stat">
                                        <div class="small text-white-50">Ranking</div>
                                        <div class="fw-bold fs-4 mt-2">Top 5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="section">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="section-title">Fitur utama yang siap dipakai</h2>
                    <p class="text-muted mx-auto" style="max-width: 680px;">Sistem ini dirancang untuk mendukung kebutuhan operasional ekstrakurikuler voli dalam lingkungan sekolah.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <div class="feature-icon">👥</div>
                            <h5 class="fw-bold mb-2">User Management</h5>
                            <p class="text-muted mb-0">Mengelola akun admin, coach, dan member dalam satu sistem yang terorganisir.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <div class="feature-icon">📅</div>
                            <h5 class="fw-bold mb-2">Jadwal Latihan</h5>
                            <p class="text-muted mb-0">Atur jadwal ekskul secara cepat dengan tanggal, jam, lokasi, dan catatan latihan.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <div class="feature-icon">✅</div>
                            <h5 class="fw-bold mb-2">Attendance</h5>
                            <p class="text-muted mb-0">Merekam kehadiran tiap atlet dengan status hadir, terlambat, izin, dan absen.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <div class="feature-icon">🏆</div>
                            <h5 class="fw-bold mb-2">Ranking</h5>
                            <p class="text-muted mb-0">Pantau performa pemain dan tampilkan leaderboard yang memotivasi seluruh tim.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="section-title">Role-based access</h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="role-card admin h-100">
                            <span class="badge-soft admin">ADMIN</span>
                            <h4 class="mt-3 mb-2">Dashboard Admin</h4>
                            <p class="text-muted mb-0">Mengatur pengguna, jadwal, dan kontrol operasional keseluruhan ekstrakurikuler.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="role-card coach h-100">
                            <span class="badge-soft coach">COACH</span>
                            <h4 class="mt-3 mb-2">Dashboard Coach</h4>
                            <p class="text-muted mb-0">Mencatat absensi dan menilai performa pemain dengan data yang mudah dibaca.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="role-card member h-100">
                            <span class="badge-soft member">MEMBER</span>
                            <h4 class="mt-3 mb-2">Dashboard Member</h4>
                            <p class="text-muted mb-0">Melihat perkembangan latihan, pencapaian, dan posisi ranking diri sendiri.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section pb-5">
            <div class="container">
                <div class="demo-box">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-8">
                            <div class="small text-white-50 mb-2">Demo akun</div>
                            <h3 class="mb-3">Coba fitur sistem dalam waktu singkat</h3>
                            <p class="mb-0 text-white-75">Login dengan akun demo berikut untuk mengecek role masing-masing.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn btn-light text-primary fw-bold px-4">Buka Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container text-center">
            © 2026 SMKN 1 Probolinggo • Volleyball Club Management
        </div>
    </footer>
</body>
</html>
