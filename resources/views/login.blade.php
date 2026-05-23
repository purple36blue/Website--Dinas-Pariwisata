<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/theme.css">
    <title>login</title>
</head>
<body>

<div class="min-h-screen flex">

    <!-- LEFT -->
    <div class="login-left">

        <img
            src="images/patung.jpg"
            class="login-bg"
        >

        <div class="overlay"></div>

        <div class="login-left-content">

            <div class="brand-box">

                <div class="brand-icon">
                    📍
                </div>

                <h2 class="brand-title">
                    Dinas Pariwisata
                </h2>

                <p class="brand-subtitle">
                    Sistem Manajemen Data Dinas Pariwisata Kabupaten Poso
                </p>

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="login-right">

        <div class="card">

            <div class="text-center">

                <h1>Login Admin</h1>

                <p>
                    Masuk ke dashboard administrator
                </p>

            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <div class="mb-3">
                    <label>Username</label>
                    <input type="name" name="name" class="form-control" placeholder="Masukan Username" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                </div>

                <button class="btn btn-primary w-100">Masuk</button>
            </form>
            <div class="demo">

                <p>Demo Credentials:</p>
                <p>Username: admin123</p>
                <p>Password: (any password)</p>

            </div>

            <div class="text-center">

                <button
                    class="btn btn-ghost"
                    onclick="window.location.href='/'"
                >
                    ← Kembali ke Beranda
                </button>

            </div>

        </div>

    </div>

</div>

<script src="login.js"></script>

</body>
</html>