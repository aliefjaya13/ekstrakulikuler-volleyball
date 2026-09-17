<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #123c69;
            --blue: #1d6fd6;
            --sidebar: #0f243f;
            --soft: #edf4ff;
            --shadow: 0 16px 32px rgba(17, 24, 39, 0.08);
        }

        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #f5f8fd 0%, #edf4ff 100%);
            min-height: 100vh;
            color: #1f2a37;
        }

        .app-shell { display: flex; min-height: 100vh; }
        .sidebar {
            width: 260px; background: linear-gradient(180deg, var(--sidebar) 0%, #173559 100%);
            color: white; padding: 24px 18px; position: sticky; top: 0; height: 100vh;
        }
        .brand-box { display: flex; align-items: center; gap: 12px; padding: 10px 12px 18px; border-bottom: 1px solid rgba(255,255,255,0.08); margin-bottom: 16px; }
        .brand-mark { width: 42px; height: 42px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.12); }
        .nav-section { display: grid; gap: 8px; }
        .nav-link { display: flex; align-items: center; gap: 12px; padding: 12px 14px; border-radius: 12px; text-decoration: none; color: rgba(255,255,255,0.82); font-weight: 600; }
        .nav-link:hover, .nav-link.active { background: rgba(255,255,255,0.08); color: white; text-decoration: none; }
        .content { flex: 1; }
        .topbar { background: rgba(255,255,255,0.94); backdrop-filter: blur(8px); border-bottom: 1px solid rgba(148,163,184,0.18); padding: 16px 28px; display: flex; justify-content: space-between; align-items: center; }
        .user-chip { display: inline-flex; align-items: center; gap: 10px; background: var(--soft); border-radius: 999px; padding: 8px 12px; color: var(--navy); font-weight: 600; }
        .main-panel { padding: 28px; }
        .panel { border: none; border-radius: 1.1rem; box-shadow: var(--shadow); background: rgba(255,255,255,0.96); }
        .header-panel { padding: 22px 24px; }
        .form-control, .form-select { border-radius: 0.85rem; padding: 0.8rem 0.9rem; border-color: #dfe9f5; }
        .primary-btn { background: linear-gradient(135deg, #184b82 0%, #1d6fd6 100%); border: none; border-radius: 0.85rem; padding: 0.75rem 1.2rem; font-weight: 600; }
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
                <a class="nav-link" href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
                <a class="nav-link active" href="{{ route('admin.users.index') }}">👥 Kelola User</a>
                <a class="nav-link" href="{{ route('admin.schedules.index') }}">📅 Jadwal</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link border-0 w-100 text-start" style="background: transparent;">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            <div class="topbar">
                <div class="fw-semibold">Tambah User</div>
                <div class="user-chip">👤 {{ auth()->user()->name }}</div>
            </div>

            <div class="main-panel">
                <div class="panel header-panel mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Management</p>
                            <h2 class="mb-0">Tambah User</h2>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="panel p-4">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="admin">Admin</option>
                                <option value="coach">Coach</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn primary-btn text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
