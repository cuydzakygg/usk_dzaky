
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Aplikasi Sertifikasi</title>

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
            width: 100%;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-left {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            color: #142c55;
        }

        .brand span {
            color: #2563eb;
        }

        /* MENU NAVIGASI */
        .nav-menu {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        /* TOMBOL SAMA SEPERTI WELCOME */
        .nav-button {
            display: inline-block;
            padding: 12px 23px;
            background: #2563eb;
            color: #ffffff;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: 0.3s;
        }

        .nav-button:hover {
            background: #1d4ed8;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-name {
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        /* TOMBOL LOGOUT */
        .logout-btn {
            border: none;
            background: #dc2626;
            color: #ffffff;
            padding: 12px 20px;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #b91c1c;
            transform: translateY(-2px);
        }

        /* KONTEN */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 8px;
            color: #142c55;
        }

        .welcome p {
            color: #64748b;
            line-height: 1.7;
        }

        /* KARTU STATISTIK */
        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: #ffffff;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
        }

        .card-title {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card-number {
            font-size: 32px;
            font-weight: bold;
            color: #1e3a8a;
        }

        /* TABEL PESERTA */
        .section {
            background: #ffffff;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            overflow-x: auto;
        }

        .section h2 {
            margin-bottom: 20px;
            color: #142c55;
            font-size: 23px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
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
            color: #475569;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 30px 15px;
        }

        /* RESPONSIVE TABLET DAN HP */
        @media (max-width: 700px) {
            .navbar {
                padding: 18px 5%;
                align-items: flex-start;
                flex-direction: column;
            }

            .navbar-left {
                width: 100%;
            }

            .brand {
                font-size: 22px;
            }

            .nav-menu {
                gap: 8px;
            }

            .nav-button {
                padding: 10px 14px;
                font-size: 13px;
            }

            .navbar-right {
                width: 100%;
                justify-content: space-between;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .container {
                margin-top: 25px;
            }

            .welcome h1 {
                font-size: 26px;
            }

            .section {
                padding: 18px;
            }

            table {
                min-width: 650px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="navbar-left">
            <div class="brand">
                Aplikasi <span>Sertifikasi</span>
            </div>

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
        </div>

        <div class="navbar-right">

            <span class="admin-name">
                {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

    </nav>

    <!-- KONTEN DASHBOARD -->
    <main class="container">

        <div class="welcome">
            <h1>Dashboard</h1>

            <p>
                Selamat datang di Aplikasi Pengelolaan Data Peserta Sertifikasi.
            </p>
        </div>

        <!-- STATISTIK -->
        <div class="cards">

            <div class="card">
                <div class="card-title">
                    Total Peserta
                </div>

                <div class="card-number">
                    {{ $totalPeserta }}
                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    Total Skema Sertifikasi
                </div>

                <div class="card-number">
                    {{ $totalSkema }}
                </div>
            </div>

        </div>

        <!-- PESERTA TERBARU -->
        <div class="section">

            <h2>Peserta Terbaru</h2>

            @if ($pesertaTerbaru->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Skema Sertifikasi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pesertaTerbaru as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peserta->nik }}</td>
                                <td>{{ $peserta->nama }}</td>
                                <td>{{ $peserta->email }}</td>
                                <td>
                                    {{ $peserta->skema->nama_skema ?? '-' }}
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
