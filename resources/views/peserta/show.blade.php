<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Peserta</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 40px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 14px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        h1 {
            margin-bottom: 25px;
            color: #0f172a;
        }

        .info {
            margin-bottom: 20px;
        }

        .label {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .value {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .empty {
            color: #64748b;
            font-weight: 500;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('peserta.index') }}">Data Peserta</a>
    <a href="{{ route('skema.index') }}">Data Skema</a>
</nav>

<div class="container">

    <div class="card">

        <h1>Detail Peserta</h1>

        <div class="info">
            <div class="label">NIK</div>
            <div class="value">
                {{ $peserta->nik }}
            </div>
        </div>

        <div class="info">
            <div class="label">Nama Lengkap</div>
            <div class="value">
                {{ $peserta->nama }}
            </div>
        </div>

        <div class="info">
            <div class="label">Email</div>
            <div class="value">
                {{ $peserta->email }}
            </div>
        </div>

        <div class="info">
            <div class="label">Nomor HP</div>
            <div class="value">
                {{ $peserta->no_hp }}
            </div>
        </div>

        <div class="info">
            <div class="label">Alamat</div>
            <div class="value">
                {{ $peserta->alamat }}
            </div>
        </div>

        <div class="info">
            <div class="label">Skema Sertifikasi</div>
            <div class="value">
                @if ($peserta->skema)
                    {{ $peserta->skema->kode }}
                    -
                    {{ $peserta->skema->nama_skema }}
                @else
                    <span class="empty">
                        Belum memiliki skema sertifikasi
                    </span>
                @endif
            </div>
        </div>

        <div class="actions">

            <a
                href="{{ route('peserta.edit', ['peserta' => $peserta->id]) }}"
                class="btn btn-primary"
            >
                Edit Peserta
            </a>

            <a
                href="{{ route('peserta.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>