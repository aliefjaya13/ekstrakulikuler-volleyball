<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --member-green: #7a1019;
            --member-soft: #fff1f2;
            --sidebar-bg: #460d18;
            --text-main: #1f2a37;
            --text-soft: #64748b;
        }

        body {
            background: linear-gradient(135deg, #fff8f8 0%, #fdf0f2 100%);
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
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(255,255,255,0.12);
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

        .user-chip {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--member-soft);
            border-radius: 999px;
            padding: 8px 12px;
            color: var(--member-green);
            font-weight: 600;
        }

        .main-panel {
            padding: 28px;
        }

        .hero-card {
            background: linear-gradient(135deg, rgba(88, 12, 20, 0.98), rgba(206, 30, 42, 0.93));
            color: white;
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 16px 32px rgba(23, 77, 57, 0.12);
            padding: 28px 30px;
            margin-bottom: 24px;
        }

        .hero-badge {
            background: rgba(255,255,255,0.18);
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 999px;
            padding: 0.5rem 0.9rem;
            font-weight: 600;
        }

        .stat-card, .soft-card {
            background: rgba(255,255,255,0.92);
            border: 1px solid rgba(148, 163, 184, 0.12);
            border-radius: 1.1rem;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }

        .card-body {
            padding: 1.4rem;
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
            text-decoration: none;
            padding: 0.9rem 1rem;
            background: var(--member-soft);
            border-radius: 0.9rem;
            border: 1px solid rgba(30, 104, 61, 0.08);
            color: var(--member-green);
            font-weight: 600;
        }

        .mini-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mini-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
                <a class="nav-link active" href="{{ route('member.dashboard') }}">📊 Dashboard</a>
                <a class="nav-link" href="{{ route('member.attendance.index') }}">📋 Absensi Saya</a>
                <a class="nav-link" href="{{ route('member.rankings.index') }}">🏆 Ranking</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link border-0 w-100 text-start" style="background: transparent;">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            <div class="topbar">
                <div class="fw-semibold text-dark">Dashboard Peserta</div>
                <div class="user-chip">👤 {{ auth()->user()->name }}</div>
            </div>

            <div class="main-panel">
                <div class="hero-card">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <p class="mb-2 text-uppercase small text-white-50">Member overview</p>
                            <h2 class="mb-1">Selamat datang, {{ auth()->user()->name }}</h2>
                            <div class="text-white-50">Lihat perkembangan latihan dan posisi kamu di ranking tim voli sekolah.</div>
                        </div>
                        <span class="hero-badge">{{ now()->translatedFormat('d F Y') }}</span>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="card stat-card h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small">Kehadiran</div>
                                    <h3 class="mb-0 mt-2">{{ $attendance }}</h3>
                                </div>
                                <div class="stat-icon bg-success-subtle text-success">🏐</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card stat-card h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small">Ranking Saat Ini</div>
                                    <h3 class="mb-0 mt-2">#{{ $rank }}</h3>
                                </div>
                                <div class="stat-icon bg-warning-subtle text-warning">🏆</div>
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
                                    <a href="{{ route('member.attendance.index') }}" class="action-item">
                                        <span>Catat Absensi</span>
                                        <span>→</span>
                                    </a>
                                    <a href="{{ route('member.rankings.index') }}" class="action-item">
                                        <span>Lihat Ranking</span>
                                        <span>→</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card soft-card h-100">
                            <div class="card-body p-4">
                                <h5 class="mb-3 fw-bold">Status Saat Ini</h5>
                                <ul class="mini-list">
                                    <li>
                                        <span>Latihan aktif</span>
                                        <span class="tag bg-success-subtle text-success">Ready</span>
                                    </li>
                                    <li>
                                        <span>Posisi di tim</span>
                                        <span class="tag bg-primary-subtle text-primary">#{{ $rank }}</span>
                                    </li>
                                    <li>
                                        <span>Catatan kehadiran</span>
                                        <span class="tag bg-warning-subtle text-warning">{{ $attendance }}</span>
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
