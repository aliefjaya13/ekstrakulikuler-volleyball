<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
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
        .primary-btn {
            background: linear-gradient(135deg, #164e39 0%, #1d6a4f 100%); border: none; border-radius: 0.85rem; padding: 0.7rem 1rem; font-weight: 600;
        }
        .form-control, .form-select { border-radius: 0.85rem; }
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
                <a class="nav-link" href="{{ route('member.dashboard') }}">📊 Dashboard</a>
                <a class="nav-link" href="{{ route('member.rankings.index') }}">🏆 Ranking</a>
                <a class="nav-link active" href="{{ route('member.attendance.index') }}">📋 Absensi Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="nav-link border-0 w-100 text-start" style="background: transparent;">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            <div class="topbar">
                <div class="fw-semibold">Absensi Saya</div>
                <div class="user-chip">👤 {{ auth()->user()->name }}</div>
            </div>

            <div class="main-panel">
                <div class="panel header-panel mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Attendance</p>
                            <h2 class="mb-0">Catat Kehadiran</h2>
                        </div>
                        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Manual</span>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success rounded-3 border-0 shadow-sm mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row g-4 mb-4">
                    <div class="col-lg-5">
                        <div class="panel p-4">
                            <h5 class="fw-bold mb-3">Form Absensi</h5>
                            <form method="POST" action="{{ route('member.attendance.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="schedule_id" class="form-label fw-semibold">Jadwal latihan</label>
                                    <select name="schedule_id" id="schedule_id" class="form-select" required>
                                        <option value="">Pilih jadwal</option>
                                        @foreach($schedules as $schedule)
                                            <option value="{{ $schedule->id }}">{{ $schedule->title }} · {{ $schedule->schedule_date }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="attendance_status" class="form-label fw-semibold">Status</label>
                                    <select name="attendance_status" id="attendance_status" class="form-select" required>
                                        <option value="present">Hadir</option>
                                        <option value="late">Terlambat</option>
                                        <option value="excused">Izin</option>
                                        <option value="absent">Absen</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="notes" class="form-label fw-semibold">Catatan</label>
                                    <textarea name="notes" id="notes" rows="4" class="form-control" placeholder="Tambahkan catatan jika perlu..."></textarea>
                                </div>

                                <button type="submit" class="btn primary-btn text-white w-100">Simpan Absensi</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="panel overflow-hidden">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Jadwal</th>
                                            <th>Status</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($records as $record)
                                            <tr>
                                                <td>{{ $record->schedule->title ?? '-' }}</td>
                                                <td>
                                                    @php
                                                        $statusClass = match($record->attendance_status) {
                                                            'present' => 'bg-success-subtle text-success',
                                                            'late' => 'bg-warning-subtle text-warning',
                                                            'excused' => 'bg-info-subtle text-info',
                                                            default => 'bg-secondary-subtle text-secondary',
                                                        };
                                                    @endphp
                                                    <span class="badge rounded-pill {{ $statusClass }}">{{ ucfirst($record->attendance_status) }}</span>
                                                </td>
                                                <td>{{ $record->notes ?: '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted py-4">Belum ada catatan absensi.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
