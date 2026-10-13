
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Peserta Sertifikasi</title>

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

        /* NAVBAR SAMA DENGAN HALAMAN SKEMA */
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

        /* TOMBOL */
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

        /* PESAN */
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

        /* PENCARIAN */
        .search-container {
            background: white;
            padding: 20px;
            border-radius: 14px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;
            min-width: 0;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        .search-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #2563eb20;
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

            .search-form {
                flex-direction: column;
            }

            .table-container {
                padding: 15px;
            }

            table {
                min-width: 850px;
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
                <h1>Data Peserta Sertifikasi</h1>
                <p>Kelola data peserta sertifikasi.</p>
            </div>

            <a href="{{ route('peserta.create') }}" class="btn btn-primary">
                + Tambah Peserta
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

        <!-- PENCARIAN -->
        <div class="search-container">
            <form
                action="{{ route('peserta.index') }}"
                method="GET"
                class="search-form"
            >
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Cari NIK, nama, atau email..."
                    value="{{ request('search') }}"
                >

                <button type="submit" class="btn btn-primary">
                    Cari
                </button>
            </form>
        </div>

        <!-- TABEL PESERTA -->
        <div class="table-container">

            @if ($pesertas->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Skema Sertifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pesertas as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $peserta->nik }}</td>

                                <td>{{ $peserta->nama }}</td>

                                <td>{{ $peserta->email }}</td>

                                <td>{{ $peserta->no_hp }}</td>

                                <td>
                                    {{ $peserta->skema->nama_skema ?? '-' }}
                                </td>

                                <td>
                                    <div class="actions">

                                        <a
                                            href="{{ route('peserta.show', $peserta) }}"
                                            class="btn btn-info"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('peserta.edit', $peserta) }}"
                                            class="btn btn-warning"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('peserta.destroy', $peserta) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data peserta ini?')"
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
                    Belum ada data peserta.
                </div>

            @endif

        </div>

    </main>

</body>
</html>
