
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Skema Sertifikasi</title>

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
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            white-space: nowrap;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .nav-button {
            display: inline-block;
            padding: 12px 23px;
            background: #2563eb;
            color: white;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: 0.3s;
        }

        .nav-button:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-2px);
        }

        /* KONTEN */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            color: #142c55;
        }

        .header p {
            color: #64748b;
            margin-top: 7px;
            line-height: 1.6;
        }

        /* TOMBOL AKSI */
        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
            white-space: nowrap;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-info {
            background: #0f766e;
            color: white;
        }

        .btn-info:hover {
            background: #115e59;
        }

        /* NOTIFIKASI */
        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        /* TABEL */
        .table-container {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #eff6ff;
            color: #1e3a8a;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .actions form {
            display: inline;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #64748b;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .navbar {
                padding: 18px 5%;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-menu {
                gap: 8px;
            }

            .nav-button {
                padding: 10px 14px;
                font-size: 13px;
            }

            .container {
                margin-top: 25px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .header h1 {
                font-size: 24px;
            }

            table {
                min-width: 700px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <a href="{{ route('dashboard') }}" class="brand">
            Aplikasi Sertifikasi
        </a>

        <div class="nav-menu">

            <a href="{{ route('dashboard') }}" class="nav-button">
                Dashboard
            </a>

            <a href="{{ route('peserta.index') }}" class="nav-button">
                Data Peserta
            </a>

            <a href="{{ route('skema.index') }}" class="nav-button">
                Data Skema
            </a>

        </div>

    </nav>

    <!-- KONTEN UTAMA -->
    <main class="container">

        <div class="header">

            <div>
                <h1>Data Skema Sertifikasi</h1>
                <p>Kelola data skema sertifikasi.</p>
            </div>

            <a href="{{ route('skema.create') }}" class="btn btn-primary">
                + Tambah Skema
            </a>

        </div>

        <!-- NOTIFIKASI -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- DAFTAR SKEMA -->
        <div class="table-container">

            @if ($skemas->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Skema</th>
                            <th>Jumlah Peserta</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($skemas as $skema)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $skema->kode }}</td>

                                <td>{{ $skema->nama_skema }}</td>

                                <td>{{ $skema->pesertas_count }}</td>

                                <td>
                                    <div class="actions">

                                        <a
                                            href="{{ route('skema.show', $skema) }}"
                                            class="btn btn-info"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('skema.edit', $skema) }}"
                                            class="btn btn-warning"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('skema.destroy', $skema) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus skema ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger"
                                            >
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <div class="empty">
                    Belum ada data skema sertifikasi.
                </div>

            @endif

        </div>

    </main>

</body>
</html>
