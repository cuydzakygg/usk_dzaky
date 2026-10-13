
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome | Aplikasi Sertifikasi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fbff;
            color: #142c55;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            padding: 25px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            color: #142c55;
            text-decoration: none;
        }

        .brand span {
            color: #2563eb;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-button {
            display: inline-block;
            padding: 12px 23px;
            background: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
            text-align: center;
            transition: 0.3s;
        }

        .nav-button:hover,
        .main-button:hover {
            background: #1d4ed8;
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* HERO */
        .hero {
            max-width: 1300px;
            min-height: 78vh;
            margin: auto;
            padding: 65px 7%;
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .hero-content {
            flex: 1.2;
        }

        .badge {
            display: inline-block;
            padding: 10px 17px;
            border-radius: 30px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        h1 {
            font-size: clamp(34px, 4vw, 54px);
            line-height: 1.2;
            margin-bottom: 22px;
            letter-spacing: -1.5px;
        }

        .description {
            color: #64748b;
            font-size: 17px;
            line-height: 1.8;
            max-width: 570px;
            margin-bottom: 32px;
        }

        /* FITUR */
        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .feature {
            padding: 17px 12px;
            background: #ffffff;
            border: 1px solid #e5edf8;
            border-radius: 14px;
        }

        .feature-icon {
            font-size: 27px;
            margin-bottom: 12px;
        }

        .feature h3 {
            font-size: 15px;
            margin-bottom: 9px;
        }

        .feature p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.7;
        }

        /* TOMBOL UTAMA */
        .main-button {
            display: inline-block;
            background: #2563eb;
            color: #ffffff;
            padding: 17px 29px;
            border-radius: 11px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: 0.3s;
        }

        .note {
            color: #64748b;
            font-size: 13px;
            margin-top: 14px;
        }

        /* ILUSTRASI */
        .hero-visual {
            flex: 1;
            min-height: 400px;
            background: linear-gradient(145deg, #dbeafe, #eff6ff);
            border-radius: 40% 25% 35% 20%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px;
        }

        .illustration {
            width: 100%;
            max-width: 390px;
            text-align: center;
        }

        .big-icon {
            font-size: 115px;
            margin-bottom: 15px;
        }

        .certificate {
            background: #ffffff;
            padding: 27px;
            border-radius: 18px;
            box-shadow: 0 15px 35px #2563eb20;
            text-align: left;
        }

        .certificate h2 {
            color: #1d4ed8;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .certificate p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
        }

        .certificate-line {
            height: 9px;
            background: #dbeafe;
            border-radius: 10px;
            margin-top: 12px;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 22px;
            color: #94a3b8;
            font-size: 13px;
        }

        /* TABLET */
        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
                padding-top: 35px;
                gap: 40px;
            }

            .hero-content,
            .hero-visual {
                width: 100%;
            }

            .hero-visual {
                min-height: 330px;
            }
        }

        /* HP */
        @media (max-width: 520px) {
            .navbar {
                padding: 20px 5%;
                gap: 12px;
                flex-wrap: wrap;
            }

            .brand {
                font-size: 19px;
            }

            .nav-actions {
                gap: 8px;
            }

            .nav-button {
                padding: 10px 13px;
                font-size: 13px;
            }

            .hero {
                padding: 30px 5%;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .feature {
                padding: 18px;
            }

            .hero-visual {
                padding: 20px;
            }

            .big-icon {
                font-size: 85px;
            }

            .certificate {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ route('welcome') }}" class="brand">
            🎓 Aplikasi <span>Sertifikasi</span>
        </a>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="nav-button">
                Login
            </a>

            <a href="{{ route('register') }}" class="nav-button">
                Register
            </a>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="hero">

        <section class="hero-content">
            <div class="badge">✓ Selamat Datang</div>

            <h1>
                Sistem Pengelolaan Data Peserta Sertifikasi
            </h1>

            <p class="description">
                Kelola data peserta dan skema sertifikasi dengan mudah,
                cepat, dan terstruktur melalui satu sistem yang terintegrasi.
            </p>

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">👥</div>
                    <h3>Data Peserta</h3>
                    <p>
                        Tambah, cari, lihat, ubah, dan hapus data peserta.
                    </p>
                </div>

                <div class="feature">
                    <div class="feature-icon">📋</div>
                    <h3>Skema Sertifikasi</h3>
                    <p>
                        Kelola informasi skema sertifikasi dengan praktis.
                    </p>
                </div>

                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <h3>Aman &amp; Terpercaya</h3>
                    <p>
                        Akses pengelolaan data melalui login administrator.
                    </p>
                </div>
            </div>

            <a href="{{ route('login') }}" class="main-button">
                → Masuk ke Sistem
            </a>

            <p class="note">
                Khusus untuk administrator.
            </p>
        </section>

        <!-- ILUSTRASI SERTIFIKASI -->
        <section class="hero-visual">
            <div class="illustration">
                <div class="big-icon">🎓</div>

                <div class="certificate">
                    <h2>📜 SERTIFIKASI</h2>

                    <p>
                        Sistem Pengelolaan Data Peserta Sertifikasi
                    </p>

                    <div class="certificate-line"></div>
                    <div class="certificate-line"></div>
                    <div
                        class="certificate-line"
                        style="width: 65%;"
                    ></div>

                    <p style="margin-top: 20px; text-align: right;">
                        ✓ Data terkelola dengan baik
                    </p>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer>
        © {{ date('Y') }} Aplikasi Sertifikasi. Semua hak dilindungi.
    </footer>

</body>
</html>
