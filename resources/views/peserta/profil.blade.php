<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Data Diri</title>

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
        }

        .navbar h2 {
            font-size: 21px;
        }

        .container {
            max-width: 800px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
        }

        h1 {
            color: #1e3a8a;
            font-size: 25px;
            margin-bottom: 10px;
        }

        .description {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
            font-family: inherit;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 12px 18px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        .save {
            background: #1d4ed8;
            color: white;
        }

        .save:hover {
            background: #1e40af;
        }

        .back {
            background: #e2e8f0;
            color: #1e293b;
        }

        @media (max-width: 600px) {
            .card {
                padding: 22px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <h2>Aplikasi Sertifikasi</h2>
    </nav>

    <main class="container">
        <section class="card">
            <h1>Lengkapi Data Diri</h1>

            <p class="description">
                Isi data diri dengan benar untuk melengkapi profil
                peserta sertifikasi kamu.
            </p>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="success" style="background:#fee2e2;color:#991b1b;">
                    Periksa kembali data yang kamu masukkan.
                </div>
            @endif

            <form action="{{ route('peserta.profil.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nik">NIK (16 angka)</label>
                    <input
                        type="text"
                        id="nik"
                        name="nik"
                        value="{{ old('nik', $peserta?->nik) }}"
                        maxlength="16"
                        inputmode="numeric"
                        required
                    >
                    @error('nik')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama', $peserta?->nama ?? Auth::user()->name) }}"
                        required
                    >
                    @error('nama')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $peserta?->email ?? Auth::user()->email) }}"
                        required
                    >
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input
                        type="tel"
                        id="no_hp"
                        name="no_hp"
                        value="{{ old('no_hp', $peserta?->no_hp) }}"
                        required
                    >
                    @error('no_hp')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        required
                    >{{ old('alamat', $peserta?->alamat) }}</textarea>
                    @error('alamat')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

           
<div class="form-group">
    <label for="skema_id">Skema Sertifikasi</label>

    <select id="skema_id" name="skema_id" required>
        <option value="">-- Pilih Skema Sertifikasi --</option>

        @forelse ($skemas as $skema)
            <option
                value="{{ $skema->id }}"
                @selected(old('skema_id', $peserta?->skema_id) == $skema->id)
            >
                {{ $skema->kode }} - {{ $skema->nama_skema }}
            </option>
        @empty
            <option value="" disabled>
                Belum ada data skema sertifikasi
            </option>
        @endforelse
    </select>

    @error('skema_id')
        <p class="error">{{ $message }}</p>
    @enderror
</div>


                <div class="actions">
                    <button type="submit" class="button save">
                        Simpan Data Diri
                    </button>

                    <a
                        href="{{ route('peserta.dashboard') }}"
                        class="button back"
                    >
                        Kembali ke Dashboard
                    </a>
                </div>
            </form>
        </section>
    </main>

</body>
</html>
