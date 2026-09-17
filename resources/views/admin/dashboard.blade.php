<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --school-navy: #4d0f18;
            --school-blue: #cf1e2d;
            --school-soft: #fff1f2;
            --school-gold: #f4b942;
            --sidebar-bg: #410b14;
            --text-main: #1f2a37;
            --text-soft: #6b7280;
            --card-shadow: 0 16px 32px rgba(77, 15, 24, 0.1);
        }

        body {
            background: linear-gradient(135deg, #fdf5f5 0%, #f9eff0 100%);
            min-height: 100vh;
            color: var(--text-main);
            font-family: "Segoe UI", sans-serif;
            margin: 0;
        }

        .app-shell {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #5a0e1b 100%);
            color: white;
            padding: 24px 18px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .brand-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 18px;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(255,255,255,0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            border: 1px solid rgba(255,255,255,0.12);
        }

        .nav-section {
            display: grid;
            gap: 8px;
            margin-top: 14px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            text-decoration: none;
            color: rgba(255,255,255,0.8);
            font-weight: 600;
            transition: 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.08);
            color: white;
            text-decoration: none;
        }

        .content {
            flex: 1;
            padding: 0;
        }

        .topbar {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(148,163,184,0.18);
            padding: 16px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar .user-chip {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--school-soft);
            border-radius: 999px;
            padding: 8px 12px;
            color: var(--school-navy);
            font-weight: 600;
        }

        .main-panel {
            padding: 28px;
        }

        .hero-card {
            background: linear-gradient(135deg, rgba(77, 15, 24, 0.98), rgba(207, 30, 45, 0.92));
            color: white;
            border: none;
            border-radius: 1.25rem;
            box-shadow: var(--card-shadow);
            padding: 28px 30px;
            margin-bottom: 24px;
        }

        .hero-badge {
            background: rgba(255,255,255,0.18);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            border-radius: 999px;
            padding: 0.5rem 0.9rem;
            font-weight: 600;
        }

        .stat-card, .soft-card {
            background: rgba(255,255,255,0.9);
            border: 1px solid rgba(148, 163, 184, 0.12);
            border-radius: 1.1rem;
            box-shadow: var(--card-shadow);
        }

        .stat-card .card-body {
            padding: 1.35rem 1.4rem;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .action-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.9rem 1rem;
            border-radius: 0.9rem;
            background: var(--school-soft);
            color: var(--school-navy);
            text-decoration: none;
            font-weight: 600;
            border: 1px solid rgba(29, 111, 214, 0.08);
            transition: 0.2s ease;
        }

        .action-item:hover {
            transform: translateY(-1px);
            text-decoration: none;
            color: var(--school-navy);
            box-shadow: 0 8px 18px rgba(29, 111, 214, 0.08);
        }

        .mini-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mini-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #edf2f7;
        }

        .mini-list li:last-child {
            border-bottom: none;
        }

        .tag {
            border-radius: 999px;
            padding: 0.35rem 0.7rem;
            font-size: 0.75rem;
            font-weight: 700;
        }

        @media (max-width: 991px) {
            .app-shell {
                display: block;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-panel {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="brand-box">
                <img src="/images/smkn1-logo.svg" alt="SMKN 1 Probolinggo" style="width: 42px; height: 42px; border-radius: 12px;">
                <div>
                    <div class="fw-bold">SMKN 1</div>
                    <small class="text-white-50">Probolinggo</small>
                </div>
            </div>

            <nav class="nav-section">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
                <a class="nav-link" href="{{ route('admin.users.index') }}">👥 Kelola User</a>
                <a class="nav-link" href="{{ route('admin.schedules.index') }}">📅 Jadwal</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link border-0 w-100 text-start" style="background: transparent;">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            <div class="topbar">
                <div class="fw-semibold text-dark">Dashboard Admin</div>
                <div class="user-chip">👤 {{ auth()->user()->name }}</div>
            </div>

            <div class="main-panel">
                <div class="hero-card">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <p class="mb-2 text-uppercase small text-white-50">Overview</p>
                            <h2 class="mb-1">Dashboard Admin</h2>
                            <div class="text-white-50">Kelola program ekstrakurikuler voli sekolah dengan lebih cepat dan rapi.</div>
                        </div>
                        <span class="hero-badge">{{ now()->translatedFormat('d F Y') }}</span>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card stat-card h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small">Total User</div>
                                    <h3 class="mb-0 mt-2">{{ $summary['users'] }}</h3>
                                </div>
                                <div class="stat-icon bg-primary-subtle text-primary">👥</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card stat-card h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small">Jadwal</div>
                                    <h3 class="mb-0 mt-2">{{ $summary['schedules'] }}</h3>
                                </div>
                                <div class="stat-icon bg-warning-subtle text-warning">📅</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card stat-card h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small">Absensi</div>
                                    <h3 class="mb-0 mt-2">{{ $summary['attendance'] }}</h3>
                                </div>
                                <div class="stat-icon bg-success-subtle text-success">✅</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card stat-card h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small">Ranking</div>
                                    <h3 class="mb-0 mt-2">{{ $summary['rankings'] }}</h3>
                                </div>
                                <div class="stat-icon bg-info-subtle text-info">🏆</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="card soft-card h-100">
                            <div class="card-body p-4">
                                <h5 class="mb-3 fw-bold">Aksi Cepat</h5>
                                <div class="d-grid gap-3">
                                    <a href="{{ route('admin.users.index') }}" class="action-item">
                                        <span>Kelola User</span>
                                        <span>→</span>
                                    </a>
                                    <a href="{{ route('admin.schedules.index') }}" class="action-item">
                                        <span>Atur Jadwal Latihan</span>
                                        <span>→</span>
                                    </a>
                                    <a href="{{ route('admin.dashboard') }}" class="action-item">
                                        <span>Lihat Ringkasan Kegiatan</span>
                                        <span>→</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card soft-card h-100">
                            <div class="card-body p-4">
                                <h5 class="mb-3 fw-bold">Status Sekolah</h5>
                                <ul class="mini-list">
                                    <li>
                                        <span>Peserta aktif</span>
                                        <span class="tag bg-primary-subtle text-primary">{{ $summary['users'] }}</span>
                                    </li>
                                    <li>
                                        <span>Jadwal terdata</span>
                                        <span class="tag bg-warning-subtle text-warning">{{ $summary['schedules'] }}</span>
                                    </li>
                                    <li>
                                        <span>Absensi tercatat</span>
                                        <span class="tag bg-success-subtle text-success">{{ $summary['attendance'] }}</span>
                                    </li>
                                    <li>
                                        <span>Performa ranking</span>
                                        <span class="tag bg-info-subtle text-info">{{ $summary['rankings'] }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
