@extends('masteradmin')

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
            gap: 60px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            width: 300px;
            max-width: 100%;
            padding: 40px;
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
            font-size: 20px;
        }

        .card p {
            font-size: 46px;
            font-weight: bold;
            color: #1565c0;
        }

        /* Tablet */
        @media (max-width: 992px) {
            .dashboard {
                padding: 60px 20px 40px;
            }

            .dashboard h1 {
                font-size: 32px;
            }

            .dashboard p {
                font-size: 20px;
            }

            .card-container {
                gap: 30px;
                margin-top: 50px;
            }

            .card {
                width: 260px;
                padding: 30px;
            }
        }

        /* Mobile */
        @media (max-width: 576px) {
            .dashboard {
                padding: 40px 15px 30px;
            }

            .dashboard h1 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .dashboard p {
                font-size: 16px;
            }

            .card-container {
                flex-direction: column;
                align-items: center;
                gap: 20px;
                margin-top: 30px;
            }

            .card {
                width: 100%;
                max-width: 320px;
                padding: 25px;
            }

            .card h2 {
                font-size: 18px;
            }

            .card p {
                font-size: 36px;
            }
        }
    </style>

    <div class="dashboard">

        <h1>
            Selamat Datang di Sistem Informasi Volunteer Kegiatan Mahasiswa
        </h1>

        <p>
            Dashboard Admin Pengelolaan Volunteer Kegiatan Mahasiswa
        </p>

        <div class="card-container">

            <div class="card">
                <h2>
                    <i class="bi bi-calendar-event"></i>
                    Total Kegiatan
                </h2>
                <p>{{ $totalKegiatan }}</p>
            </div>

            <div class="card">
                <h2>
                    <i class="bi bi-people-fill"></i>
                    Total Volunteer
                </h2>
                <p>{{ $totalVolunteer }}</p>
            </div>

        </div>

    </div>

@endsection