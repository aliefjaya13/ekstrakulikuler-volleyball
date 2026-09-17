<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --green: #1d6a4f;
            --soft: #edf9f3;
            --sidebar: #183d2f;
            --shadow: 0 16px 32px rgba(17, 24, 39, 0.08);
        }

        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #f2fbf6 0%, #eefaf4 100%);
            min-height: 100vh;
            color: #1f2a37;
        }

        .app-shell { display: flex; min-height: 100vh; }
        .sidebar {
            width: 260px; background: linear-gradient(180deg, var(--sidebar) 0%, #5a0e1b 100%);
            color: white; padding: 24px 18px; position: sticky; top: 0; height: 100vh;
        }
        .brand-box { display: flex; align-items: center; gap: 12px; padding: 10px 12px 18px; border-bottom: 1px solid rgba(255,255,255,0.08); margin-bottom: 16px; }
        .brand-mark {
            width: 42px; height: 42px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.12); font-size: 1.2rem;
        }
        .nav-section { display: grid; gap: 8px; }
        .nav-link {
            display: flex; align-items: center; gap: 12px; padding: 12px 14px; border-radius: 12px;
            text-decoration: none; color: rgba(255,255,255,0.82); font-weight: 600;
        }
        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,0.08); color: white; text-decoration: none; }
        .content { flex: 1; }
        .topbar {
            background: rgba(255,255,255,0.94); backdrop-filter: blur(8px); border-bottom: 1px solid rgba(148,163,184,0.18);
            padding: 16px 28px; display: flex; justify-content: space-between; align-items: center;
        }
        .user-chip {
            display: inline-flex; align-items: center; gap: 10px; background: var(--soft); border-radius: 999px; padding: 8px 12px;
            color: var(--green); font-weight: 600;
        }
        .main-panel { padding: 28px; }
        .panel {
            border: none; border-radius: 1.1rem; box-shadow: var(--shadow); background: rgba(255,255,255,0.96);
        }
        .header-panel { padding: 22px 24px; }
        .rank-badge {
            display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px; border-radius: 50%;
            background: #eafaf1; color: #1a7b4d; font-weight: 700;
        }
        @media (max-width: 991px) {
            .app-shell { display: block; }
            .sidebar { width: 100%; height: auto; position: relative; }
            .main-panel { padding: 20px; }
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
                <a class="nav-link" href="{{ route('member.dashboard') }}">📊 Dashboard</a>
                <a class="nav-link" href="{{ route('member.attendance.index') }}">📋 Absensi Saya</a>
                <a class="nav-link active" href="{{ route('member.rankings.index') }}">🏆 Ranking</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link border-0 w-100 text-start" style="background: transparent;">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            <div class="topbar">
                <div class="fw-semibold">Leaderboard Ranking</div>
                <div class="user-chip">👤 {{ auth()->user()->name }}</div>
            </div>

            <div class="main-panel">
                <div class="panel header-panel mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Performance</p>
                            <h2 class="mb-0">Leaderboard Ranking</h2>
                        </div>
                        <span class="badge bg-success rounded-pill px-3 py-2">Updated today</span>
                    </div>
                </div>

                <div class="panel overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Rank</th>
                                    <th>Peserta</th>
                                    <th>Skor Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rankings as $ranking)
                                    <tr>
                                        <td><span class="rank-badge">#{{ $ranking->rank_position }}</span></td>
                                        <td class="fw-semibold">{{ $ranking->user->name ?? '-' }}</td>
                                        <td>{{ $ranking->total_score }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Belum ada data ranking.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
