
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        nav {
            background: #1e3a8a;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 16px;
        }

        main {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px #0000000d;
        }

        h1 { margin-top: 0; }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        .label {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .value {
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            background: #1d4ed8;
            color: white;
            text-decoration: none;
        }

        .notice {
            background: #fef3c7;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        form { display: inline; }
    </style>
</head>

<body>
<nav>
    <strong>Aplikasi Sertifikasi</strong>

    <div>
        <a href="{{ route('peserta.dashboard') }}">Dashboard</a>
        <a href="{{ route('peserta.profil.edit') }}">Data Diri</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</nav>

<main>
    <section class="card">
        <h1>Dashboard Peserta</h1>

        <p>
            Selamat datang,
            <strong>{{ auth()->user()->name }}</strong>!
        </p>

        <p>Berikut informasi data diri dan sertifikasi kamu.</p>
    </section>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if (!$peserta || !$peserta->nik)
        <div class="notice">
            Data diri kamu belum lengkap. Silakan lengkapi formulir terlebih dahulu.
            <br><br>
<a class="button" href="{{ route('peserta.profil.edit') }}">
    Lengkapi Data Diri
</a>
        </div>
    @else
        <section class="card">
            <h2>Data Diri</h2>

            <div class="grid">
                <div>
                    <div class="label">Nama Lengkap</div>
                    <div class="value">{{ $peserta->nama }}</div>
                </div>

                <div>
                    <div class="label">Email</div>
                    <div class="value">{{ $peserta->email }}</div>
                </div>

                <div>
                    <div class="label">NIK</div>
                    <div class="value">{{ $peserta->nik }}</div>
                </div>

                <div>
                    <div class="label">Nomor HP</div>
                    <div class="value">{{ $peserta->no_hp }}</div>
                </div>

                <div>
                    <div class="label">Alamat</div>
                    <div class="value">{{ $peserta->alamat }}</div>
                </div>
            </div>

            <br>

            <a class="button" href="{{ route('peserta.profil.edit') }}">
                Edit Data Diri
            </a>
        </section>

        <section class="card">
            <h2>Informasi Sertifikasi</h2>

            <div class="label">Skema Sertifikasi</div>
            <div class="value">
                {{ $peserta->skema?->nama_skema ?? 'Belum memilih skema' }}
            </div>
        </section>
    @endif
</main>
</body>
</html>
