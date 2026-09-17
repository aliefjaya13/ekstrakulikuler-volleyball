<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #123c69;
            --blue: #1f6ecf;
            --sidebar: #0f2d44;
            --soft: #eaf3ff;
            --shadow: 0 16px 32px rgba(17, 24, 39, 0.08);
        }

        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #f4f9ff 0%, #edf6ff 100%);
            min-height: 100vh;
            color: #1f2a37;
        }

        .app-shell { display: flex; min-height: 100vh; }
        .sidebar {
            width: 260px; background: linear-gradient(180deg, var(--sidebar) 0%, #153b5d 100%);
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
            color: var(--navy); font-weight: 600;
        }
        .main-panel { padding: 28px; }
        .panel {
            border: none; border-radius: 1.1rem; box-shadow: var(--shadow); background: rgba(255,255,255,0.96);
        }
        .header-panel { padding: 22px 24px; }
        .form-control, .form-select { border-radius: 0.85rem; padding: 0.8rem 0.9rem; border-color: #dfe9f5; }
        .primary-btn {
            background: linear-gradient(135deg, #184b82 0%, #1d6fd6 100%); border: none; border-radius: 0.85rem; padding: 0.75rem 1.2rem; font-weight: 600;
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
                <div class="fw-semibold">Input Absensi</div>
                <div class="user-chip">👤 {{ auth()->user()->name }}</div>
            </div>

            <div class="main-panel">
                <div class="panel header-panel mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Attendance</p>
                            <h2 class="mb-0">Input Absensi</h2>
                        </div>
                        <a href="{{ route('coach.dashboard') }}" class="btn btn-outline-primary">Kembali</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success rounded-3 border-0 shadow-sm mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="panel p-4">
                    <form method="POST" action="{{ route('coach.attendance.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jadwal</label>
                                <select name="schedule_id" class="form-select" required>
                                    <option value="">Pilih jadwal...</option>
                                    @foreach($schedules as $schedule)
                                        <option value="{{ $schedule->id }}">{{ $schedule->title }} - {{ $schedule->schedule_date }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Peserta</label>
                                <select name="user_id" class="form-select" required>
                                    <option value="">Pilih peserta...</option>
                                    @foreach(App\Models\User::where('role', 'member')->get() as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status Kehadiran</label>
                                <select name="attendance_status" class="form-select" required>
                                    <option value="present">Hadir</option>
                                    <option value="late">Terlambat</option>
                                    <option value="absent">Absen</option>
                                    <option value="excused">Izin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Catatan</label>
                                <input type="text" name="notes" class="form-control" placeholder="Masukkan catatan opsional">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn primary-btn text-white px-4">Simpan Absensi</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
