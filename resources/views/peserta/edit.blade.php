<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Peserta</title>

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
        textarea,
        select {
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
        textarea:focus,
        select:focus {
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
    <a href="{{ route('peserta.index') }}">Data Peserta</a>
    <a href="{{ route('skema.index') }}">Data Skema</a>
</nav>

<div class="container">

    <div class="card">

        <h1>Edit Data Peserta</h1>

        <p class="subtitle">
            Perbarui informasi peserta sertifikasi.
        </p>

        <form
            action="{{ route('peserta.update', $peserta) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nik">NIK</label>

                <input
                    type="text"
                    id="nik"
                    name="nik"
                    value="{{ old('nik', $peserta->nik) }}"
                    required
                >

                @error('nik')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $peserta->nama) }}"
                    required
                >

                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $peserta->email) }}"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>

                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp', $peserta->no_hp) }}"
                    required
                >

                @error('no_hp')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>

                <textarea
                    id="alamat"
                    name="alamat"
                    required
                >{{ old('alamat', $peserta->alamat) }}</textarea>

                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="skema_id">Skema Sertifikasi</label>

                <select
                    id="skema_id"
                    name="skema_id"
                    required
                >
                    <option value="">-- Pilih Skema --</option>

                    @foreach ($skemas as $skema)
                        <option
                            value="{{ $skema->id }}"
                            {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}
                        >
                            {{ $skema->kode }} - {{ $skema->nama_skema }}
                        </option>
                    @endforeach

                </select>

                @error('skema_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('peserta.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>