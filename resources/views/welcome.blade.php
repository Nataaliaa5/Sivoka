<html lang="id">

<head>
    <title>Beranda Volunteer</title>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #BCDCF1;
            font-family: 'Poppins', sans-serif;
        }

        /* HEADER */
        header {
            background-color: white;
            padding: 22px 60px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* LOGO */
        .logo h1 {
            color: #173B5E;
            font-size: 35px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* MENU */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 45px;
        }

        .nav-menu a {
            text-decoration: none;
            color: black;
            font-size: 25px;
            font-weight: 600;
            transition: 0.3s;
            padding-bottom: 6px;
        }

        .nav-menu a:hover {
            color: #1979B7;
        }

        /* MENU AKTIF */
        .active {
            color: #1979B7;
            border-bottom: 3px solid #1979B7;
        }

        /* LOGIN REGISTER */
        .nav-link {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-link a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        .login {
            background: #2196f3;
            color: white;
            font-size: 20px;
        }

        .register {
            background: #1565c0;
            color: white;
            font-size: 20px;
        }

        .nav-link a:hover {
            opacity: 0.85;
        }

        /* Content agar footer tetap di bawah */
        .content {
            flex: 1;
        }

        /* Dashboard */
        .dashboard {
            padding: 80px 20px 50px;
            text-align: center;
        }

        .dashboard h1 {
            font-size: 42px;
            color: #1b3556;
            margin-bottom: 15px;
        }

        .dashboard p {
            font-size: 25px;
            color: #333;
        }

        .card-container {
            margin-top: 70px;
            display: flex;
            justify-content: center;
            gap: 80px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            width: 350px;
            padding: 45px;
            border-radius: 15px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            color: #2196f3;
            margin-bottom: 15px;
        }

        .card p {
            font-size: 50px;
            font-weight: bold;
            color: #1565c0;
        }

        /* Footer */
        .footer {
            background: #5f9ac2;
            color: white;
            padding: 40px 20px;
            text-align: center;
            margin-top: auto;
        }

        .footer h3 {
            margin-bottom: 10px;
            font-size: 28px;
        }

        .footer p {
            margin-bottom: 20px;
            color: #ddd;
            font-size: 25px;
        }

        .footer-menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-menu a {
            color: white;
            text-decoration: none;
            transition: 0.3s;
            font-size: 23px;
        }

        .footer-menu a:hover {
            color: #90caf9;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {

            header {
                padding: 20px;
            }

            .navbar {
                flex-direction: column;
                gap: 20px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .logo h1 {
                font-size: 35px;
            }

            .nav-menu a {
                font-size: 25px;
            }
        }
    </style>

</head>

<body>

    <!-- HEADER -->
    <header>

        <div class="navbar">

            <!-- LOGO -->
            <div class="logo">

                <h1>
                    SIVOKA PNC
                </h1>

            </div>

            <!-- MENU -->
            <div class="nav-menu">

                <a href="#" class="active">
                    BERANDA
                </a>

                <a href="#">
                    KEGIATAN
                </a>

                <a href="#">
                    RIWAYAT
                </a>

                <a href="#">
                    PROFIL
                </a>

            </div>

            <!-- LOGIN REGISTER -->
            <div class="nav-link">

                @if (Route::has('login'))

                        <a href="{{ route('login') }}" class="login">
                            Login
                        </a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="register">
                                Register
                            </a>

                        @endif

                @endif

            </div>

        </div>

    </header>

    <!-- CONTENT -->
    <div class="content">

        <!-- Hero -->
        <div class="dashboard">

            <h1>
                Selamat Datang di Sistem Informasi Volunteer Kegiatan Mahasiswa
            </h1>

            <p>
                Dashboard Pendaftaran Volunteer Kegiatan Mahasiswa
            </p>

            <div class="card-container">

                <div class="card">

                    <h2>
                        <i class="bi bi-calendar-event"></i>
                        Total Kegiatan
                    </h2>

                    <p>5</p>

                </div>

                <div class="card">

                    <h2>
                        <i class="bi bi-person-check"></i>
                        Pendaftaran Saya
                    </h2>

                    <p>3</p>

                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-content">

            <h3>
                Volunteer Mahasiswa
            </h3>

            <p>
                Platform pendaftaran volunteer kegiatan kampus
            </p>

            <div class="footer-menu">

                <a href="#">
                    Beranda
                </a>

                <a href="#">
                    Kegiatan
                </a>

                <a href="#">
                    Kontak
                </a>

                <a href="#">
                    Profil
                </a>

            </div>

        </div>

    </footer>

</body>

</html>