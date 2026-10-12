<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Skema Sertifikasi</title>

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
        }

        .container {
            max-width: 900px;
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
        }

        .description {
            line-height: 1.6;
            font-weight: normal;
        }

        .participants {
            margin-top: 30px;
            border-top: 1px solid #e2e8f0;
            padding-top: 25px;
        }

        .participants h2 {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f8fafc;
        }

        .empty {
            color: #64748b;
            padding: 15px 0;
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
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('skema.index') }}">Data Skema</a>
</nav>

<div class="container">

    <div class="card">

        <h1>Detail Skema Sertifikasi</h1>

        <div class="info">
            <div class="label">Kode Skema</div>

            <div class="value">
                {{ $skema->kode }}
            </div>
        </div>

        <div class="info">
            <div class="label">Nama Skema</div>

            <div class="value">
                {{ $skema->nama_skema }}
            </div>
        </div>

        <div class="info">
            <div class="label">Deskripsi</div>

            <div class="value description">
                {{ $skema->deskripsi ?: 'Tidak ada deskripsi.' }}
            </div>
        </div>

        <div class="participants">

            <h2>Peserta Terdaftar</h2>

            @if ($skema->pesertas->count() > 0)

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($skema->pesertas as $peserta)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peserta->nik }}</td>
                                <td>{{ $peserta->nama }}</td>
                                <td>{{ $peserta->email }}</td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">
                    Belum ada peserta yang menggunakan skema ini.
                </div>

            @endif

        </div>

        <div class="actions">

            <a
                href="{{ route('skema.edit', $skema) }}"
                class="btn btn-primary"
            >
                Edit Skema
            </a>

            <a
                href="{{ route('skema.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>