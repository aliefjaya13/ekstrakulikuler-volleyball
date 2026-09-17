<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #f4f9ff 0%, #edf6ff 100%);
            min-height: 100vh;
            color: #1f2a37;
        }
        .app-shell { display: flex; min-height: 100vh; }
        .sidebar {
            width: 260px; background: linear-gradient(180deg, #0f2d44 0%, #153b5d 100%);
            color: white; padding: 24px 18px; position: sticky; top: 0; height: 100vh;
        }
        .brand-box { display: flex; align-items: center; gap: 12px; padding: 10px 12px 18px; border-bottom: 1px solid rgba(255,255,255,0.08); margin-bottom: 16px; }
        .brand-mark { width: 42px; height: 42px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.12); }
        .nav-section { display: grid; gap: 8px; }
        .nav-link { display: flex; align-items: center; gap: 12px; padding: 12px 14px; border-radius: 12px; text-decoration: none; color: rgba(255,255,255,0.82); font-weight: 600; }
        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,0.08); color: white; text-decoration: none; }
        .content { flex: 1; }
        .topbar { background: rgba(255,255,255,0.94); padding: 16px 28px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(148,163,184,0.18); }
        .user-chip { display: inline-flex; align-items: center; gap: 10px; background: #eaf3ff; border-radius: 999px; padding: 8px 12px; color: #123c69; font-weight: 600; }
        .main-panel { padding: 28px; }
        .panel { background: rgba(255,255,255,0.96); border: none; border-radius: 1.1rem; box-shadow: 0 16px 32px rgba(17, 24, 39, 0.08); }
        .card-body { padding: 2rem; }
        @media (max-width: 991px) { .app-shell { display: block; } .sidebar { width: 100%; height: auto; position: relative; } .main-panel { padding: 20px; } }
    </style>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="brand-box">
                <span class="brand-mark">🏐</span>
                <div>
                    <div class="fw-bold">Volleyball Ekstra</div>
                    <small class="text-white-50">SmexaPro</small>
                </div>
            </div>
            <nav class="nav-section">
                <a class="nav-link" href="{{ route('coach.dashboard') }}">📊 Dashboard</a>
                <a class="nav-link active" href="{{ route('coach.attendance') }}">📋 Absensi</a>
                <a class="nav-link" href="{{ route('coach.evaluations.index') }}">✅ Penilaian</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link border-0 w-100 text-start" style="background: transparent;">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            <div class="topbar">
                <div class="fw-semibold">Absensi Latihan</div>
                <div class="user-chip">👤 {{ auth()->user()->name }}</div>
            </div>
            <div class="main-panel">
                <div class="panel">
                    <div class="card-body">
                        <h2 class="mb-3">Absensi Latihan</h2>
                        <p class="text-muted mb-0">Fitur absensi akan dihubungkan ke database schedule dan attendance di tahap berikutnya.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
