```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .navbar h2 {
            font-size: 21px;
        }

        .navbar span {
            font-size: 14px;
        }

        .logout {
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 10px 16px;
            cursor: pointer;
        }

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .welcome {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .welcome h1 {
            color: #1e3a8a;
            font-size: 27px;
            margin-bottom: 12px;
        }

        .welcome p {
            color: #64748b;
            line-height: 1.7;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .card h3 {
            color: #1e3a8a;
            margin-bottom: 12px;
        }

        .card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
            font-size: 13px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 5%;
            }

            .welcome h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h2>Aplikasi Sertifikasi</h2>

        <div>
            <span>
                Halo, {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}"
                  method="POST"
                  style="display: inline-block; margin-left: 12px;">
                @csrf
                <button type="submit" class="logout">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="container">

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <section class="welcome">
            <h1>Dashboard Peserta</h1>

            <p>
                Selamat datang di Aplikasi Pengelolaan Data Peserta
                Sertifikasi. Halaman ini merupakan halaman utama akun
                peserta setelah berhasil login atau melakukan registrasi.
            </p>
        </section>

        <section class="cards">

            <div class="card">
                <h3>Profil Peserta</h3>
                <p>
                    Nama: {{ Auth::user()->name }}
                </p>
                <p>
                    Email: {{ Auth::user()->email }}
                </p>
            </div>

            <div class="card">
                <h3>Informasi Sertifikasi</h3>
                <p>
                    Informasi mengenai skema sertifikasi dapat diperoleh
                    melalui administrator.
                </p>
            </div>

            <div class="card">
                <h3>Status Akun</h3>
                <p>
                    Akun kamu berhasil masuk ke dalam aplikasi.
                    Silakan hubungi administrator jika membutuhkan
                    bantuan terkait data sertifikasi.
                </p>
            </div>

        </section>

    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} Aplikasi Pengelolaan Data Peserta Sertifikasi
    </footer>

</body>
</html>
```