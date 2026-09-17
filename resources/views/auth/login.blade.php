<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SMKN 1 Probolinggo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #fbe9ea 0%, #fff5f5 100%);
            font-family: "Segoe UI", sans-serif;
        }

        .login-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-card {
            width: 100%;
            max-width: 980px;
            background: rgba(255,255,255,0.96);
            border: none;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 24px 48px rgba(15, 23, 42, 0.12);
        }

        .login-left {
            background: linear-gradient(135deg, #6d0d18 0%, #b51220 100%);
            color: white;
            padding: 3rem 2rem;
        }

        .login-left .logo-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 62px;
            height: 62px;
            border-radius: 18px;
            background: rgba(255,255,255,0.12);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .login-left h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.7rem;
        }

        .login-left p {
            color: rgba(255,255,255,0.8);
            margin-bottom: 0;
            line-height: 1.7;
        }

        .login-right {
            padding: 3rem 2rem;
        }

        .form-control {
            border-radius: 0.85rem;
            padding: 0.8rem 0.9rem;
            border-color: #dfe9f5;
        }

        .btn-primary {
            border-radius: 0.85rem;
            padding: 0.8rem 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #8f111d 0%, #d91f26 100%);
            border: none;
        }

        .demo-box {
            background: #f3f7ff;
            border: 1px solid #dfe9f5;
            border-radius: 0.9rem;
            padding: 0.9rem 1rem;
            font-size: 0.88rem;
            color: #56657a;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <div class="login-shell">
        <div class="card login-card">
            <div class="row g-0">
                <div class="col-lg-5 login-left d-flex align-items-center">
                    <div>
                        <div class="logo-badge"><img src="/images/smkn1-logo.svg" alt="SMKN 1 Probolinggo" style="width: 52px; height: 52px; border-radius: 14px;"></div>
                        <h1>SMKN 1 Probolinggo</h1>
                        <p>Platform manajemen ekstrakurikuler bola voli sekolah untuk admin, pelatih, dan peserta. Kelola latihan, absensi, dan ranking dengan lebih efektif.</p>
                    </div>
                </div>

                <div class="col-lg-7 login-right">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="mb-1">Masuk</h2>
                            <p class="text-muted mb-0">Login ke dashboard</p>
                        </div>
                        <div class="d-flex align-items-center gap-2 bg-light rounded-pill px-3 py-2">
                            <img src="/images/smkn1-logo.svg" alt="SMKN 1 Probolinggo" style="width: 24px; height: 24px;">
                            <span class="badge text-primary fw-semibold">School Portal</span>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="contoh: admin@voli.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                    </form>

                    <div class="demo-box">
                        <strong>Demo account:</strong><br>
                        Admin: admin@voli.com / password123<br>
                        Coach: coach@voli.com / password123<br>
                        Member: member@voli.com / password123
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
