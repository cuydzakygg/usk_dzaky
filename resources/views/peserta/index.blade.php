<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Peserta</title>

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
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #64748b;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .search-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-form input {
            flex: 1;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
        }

        .table-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #f8fafc;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .alert {
            padding: 12px 15px;
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

        .empty {
            text-align: center;
            padding: 30px;
            color: #64748b;
        }

        .delete-form {
            display: inline;
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

    <div class="header">
        <div>
            <h1>Data Peserta</h1>
            <p class="subtitle">
                Kelola data peserta sertifikasi.
            </p>
        </div>

        <a
            href="{{ route('peserta.create') }}"
            class="btn btn-primary"
        >
            + Tambah Peserta
        </a>
    </div>

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

    <div class="search-box">

        <form
            action="{{ route('peserta.index') }}"
            method="GET"
            class="search-form"
        >

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                placeholder="Cari NIK, nama, atau email..."
            >

            <button
                type="submit"
                class="btn btn-primary"
            >
                Cari
            </button>

            @if ($search)
                <a
                    href="{{ route('peserta.index') }}"
                    class="btn btn-secondary"
                >
                    Reset
                </a>
            @endif

        </form>

    </div>

    <div class="table-card">

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

                @forelse ($pesertas as $peserta)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $peserta->nik }}
                        </td>

                        <td>
                            {{ $peserta->nama }}
                        </td>

                        <td>
                            {{ $peserta->email }}
                        </td>

                        <td>
                            {{ $peserta->no_hp }}
                        </td>

                        <td>
                            {{ $peserta->skema->nama_skema }}
                        </td>

                        <td>
                            <div class="actions">

                                <a
                                    href="{{ route('peserta.show', $peserta) }}"
                                    class="btn btn-secondary"
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
                                    class="delete-form"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus peserta ini?')"
                                    >
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="empty">
                            Belum ada data peserta.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>