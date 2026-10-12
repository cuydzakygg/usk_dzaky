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
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
        }

        .header p {
            color: #64748b;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
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

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-info {
            background: #0f766e;
            color: white;
        }

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
            background: #f8fafc;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        .actions {
            display: flex;
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
    </style>
</head>

<body>

<nav class="navbar">

    <strong>Aplikasi Sertifikasi</strong>

    <div>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('skema.index') }}">Skema</a>
    </div>

</nav>

<div class="container">

    <div class="header">

        <div>
            <h1>Data Skema Sertifikasi</h1>
            <p>Kelola data skema sertifikasi.</p>
        </div>

        <a href="{{ route('skema.create') }}" class="btn btn-primary">
            + Tambah Skema
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

</div>

</body>
</html>