@extends('masterpengguna')

@section('konten')

    <style>
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
            font-size: 22px;
            color: #555;
        }

        .card-container {
            margin-top: 60px;
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .card {
            background: #fff;
            width: 300px;
            max-width: 100%;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .1);
            transition: .3s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, .15);
        }

        .card i {
            font-size: 45px;
            color: #2196f3;
            margin-bottom: 15px;
        }

        .card h2 {
            color: #173B5E;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 46px;
            color: #1565c0;
            font-weight: bold;
        }

        .card small {
            color: #777;
            font-size: 15px;
        }

        /* Tablet */

        @media(max-width:992px) {

            .dashboard h1 {
                font-size: 32px;
            }

            .dashboard p {
                font-size: 18px;
            }

            .card {
                width: 260px;
            }

        }

        /* HP */

        @media(max-width:576px) {

            .dashboard {
                padding: 40px 15px;
            }

            .dashboard h1 {
                font-size: 24px;
            }

            .dashboard p {
                font-size: 16px;
            }

            .card-container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 100%;
            }

            .card p {
                font-size: 38px;
            }

        }
    </style>

    <div class="dashboard">

        <h1>
            Selamat Datang, {{ auth()->user()->name }}
        </h1>

        <p>
            Dashboard Volunteer Kegiatan Mahasiswa
        </p>

        <div class="card-container">

            <div class="card" onclick="window.location='{{ route('user.kegiatan') }}'">

                <i class="bi bi-calendar-event"></i>

                <h2>Total Kegiatan</h2>

                <p>{{ $totalKegiatan }}</p>

                <small>Kegiatan yang tersedia</small>

            </div>

            <div class="card" onclick="window.location='{{ route('user.riwayat') }}'">

                <i class="bi bi-person-check"></i>

                <h2>Pendaftaran Saya</h2>

                <p>{{ $pendaftaranSaya }}</p>

                <small>Total kegiatan yang diikuti</small>

            </div>

        </div>

    </div>

@endsection