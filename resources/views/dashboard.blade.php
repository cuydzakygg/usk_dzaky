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
        }.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-menu {
    display: flex;
    gap: 20px;
    margin-top: 10px;
}

.nav-menu a {
    color: #2563eb !important;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
}

.nav-menu a:hover {
    color: #1d4ed8 !important;
    text-decoration: underline;
}

.navbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
}
        .admin-name {
            font-size: 14px;
        }

        .logout-btn {
            border: none;
            background: #dc2626;
            color: white;
            padding: 9px 15px;
            border-radius: 7px;
            cursor: pointer;
        }

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
        }

        .welcome p {
            color: #64748b;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
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

        .section {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .section h2 {
            margin-bottom: 20px;
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
            background: #f8fafc;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 25px;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 15px 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .container {
                margin-top: 25px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
<nav class="navbar">

    <div>
        <h2>Aplikasi Sertifikasi</h2>

        <div class="nav-menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('peserta.index') }}">Data Peserta</a>
            <a href="{{ route('skema.index') }}">Data Skema</a>
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

<div class="container">

    <div class="welcome">
        <h1>Dashboard</h1>

        <p>
            Selamat datang di Aplikasi Pengelolaan Data Peserta Sertifikasi.
        </p>
    </div>

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

</div>

</body>
</html>