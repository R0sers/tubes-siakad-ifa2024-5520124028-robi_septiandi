<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <title>Login - Roxe SIAKAD</title>

    <style>
        body {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-dark) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-brand {
            color: #fff;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-brand .hero-eyebrow {
            color: var(--gold);
            justify-content: center;
        }

        .login-brand h2 {
            font-weight: 700;
            margin-top: 0.25rem;
        }

        .login-card {
            max-width: 420px;
            margin: 0 auto;
        }

        .login-card .btn-primary {
            background: var(--navy);
            border: none;
            width: 100%;
            padding: 0.6rem;
            font-weight: 600;
        }

        .login-card .btn-primary:hover {
            background: var(--navy-dark);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-card">
            <div class="login-brand">
                <div class="hero-eyebrow d-flex align-items-center gap-2">Sistem Informasi Akademik</div>
                <h2>Roxe University</h2>
            </div>

            <div class="card p-4">
                <h4 class="mb-3" style="color:var(--navy); font-weight:700;">Masuk ke Akun Anda</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username (Email / NPM)</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>