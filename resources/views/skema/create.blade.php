<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Skema Sertifikasi</title>

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
            max-width: 800px;
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
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 11px 18px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            cursor: pointer;
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

        <h1>Tambah Skema Sertifikasi</h1>

        <p class="subtitle">
            Masukkan informasi skema sertifikasi.
        </p>

        <form action="{{ route('skema.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="kode">
                    Kode Skema
                </label>

                <input
                    type="text"
                    id="kode"
                    name="kode"
                    value="{{ old('kode') }}"
                    placeholder="Contoh: JWD-01"
                    required
                >

                @error('kode')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">

                <label for="nama_skema">
                    Nama Skema
                </label>

                <input
                    type="text"
                    id="nama_skema"
                    name="nama_skema"
                    value="{{ old('nama_skema') }}"
                    placeholder="Contoh: Junior Web Developer"
                    required
                >

                @error('nama_skema')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">

                <label for="deskripsi">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Masukkan deskripsi skema..."
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan
                </button>

                <a
                    href="{{ route('skema.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>