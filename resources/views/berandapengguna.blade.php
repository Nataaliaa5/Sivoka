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
    </style>

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

@endsection