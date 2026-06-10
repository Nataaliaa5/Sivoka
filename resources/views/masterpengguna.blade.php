<html>

<head>
    <title>Master Pengguna</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #BCDCF1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
        nav {
            display: flex;
            align-items: center;
            gap: 45px;
        }

        nav a {
            text-decoration: none;
            color: black;
            font-size: 25px;
            font-weight: 600;
            transition: 0.3s;
            padding-bottom: 6px;
        }

        nav a:hover {
            color: #1979B7;
        }

        /* MENU AKTIF */
        .active {
            color: #1979B7;
            border-bottom: 3px solid #1979B7;
        }

        /* LOGOUT */
        .logout-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 32px;
            color: black;
            transition: 0.3s;
        }

        .logout-btn:hover {
            color: #1979B7;
        }

        /* CONTAINER */
        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* FOOTER */
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
            font-size: 28px;
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

            nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .logo h1 {
                font-size: 24px;
            }

            nav a {
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
            <nav>

                <a href="/blogpengguna" class="{{ request()->is('blogpengguna') ? 'active' : '' }}">

                    BERANDA

                </a>

                <a href="/kegiatanpengguna" class="{{ request()->is('kegiatanpengguna') || request()->is('kegiatan/*') ? 'active' : '' }}">

                    KEGIATAN

                </a>

                <a href="/riwayatpengguna" class="{{ request()->is('riwayatpengguna') ? 'active' : '' }}">

                    RIWAYAT

                </a>

                <a href="/profilpengguna" class="{{ request()->is('profilpengguna') ? 'active' : '' }}">

                    PROFIL

                </a>

            </nav>

            <!-- LOGOUT -->
            <div class="logout">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit" class="logout-btn">

                        <i class="fa-solid fa-right-from-bracket"></i>

                    </button>

                </form>

            </div>

        </div>

    </header>

    <!-- CONTENT -->
    <div class="container">

        @yield('konten')

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

                <a href="/blogpengguna" class="{{ request()->is('blogpengguna') ? 'active' : '' }}">
                    Beranda
                </a>

                <a href="/kegiatanpengguna" class="{{ request()->is('kegiatanpengguna') || request()->is('kegiatan/*') ? 'active' : '' }}">
                    Kegiatan
                </a>

                <a href="/riwayatpengguna" class="{{ request()->is('riwayatpengguna') ? 'active' : '' }}">
                    Riwayat
                </a>

                <a href="/profilpengguna" class="{{ request()->is('profilpengguna') ? 'active' : '' }}">
                    Profil
                </a>

            </div>

        </div>

    </footer>

</body>

</html>