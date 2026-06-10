@extends('masterpengguna')

@section('konten')

    <style>
        .profil-container {
            padding: 50px 60px;
            display: flex;
            justify-content: center;
        }

        .profil-card {
            background: white;
            width: 650px;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profil-title {
            font-size: 32px;
            color: #173B5E;
            margin-bottom: 30px;
        }

        .foto-profil {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #1979B7;
            margin-bottom: 25px;
        }

        .profil-item {
            text-align: left;
            margin-top: 20px;
        }

        .profil-item label {
            font-size: 20px;
            font-weight: bold;
            color: #173B5E;
        }

        .profil-value {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            margin-top: 8px;
            font-size: 18px;
        }

        .btn-edit {
            display: inline-block;
            margin-top: 30px;
            background: #1979B7;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-edit:hover {
            background: #125d8d;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>

    <div class="profil-container">

        <div class="profil-card">

            <h1 class="profil-title">
                Profil Pengguna
            </h1>

            @if(session('success'))

                <div class="success">
                    {{ session('success') }}
                </div>

            @endif

            {{-- FOTO --}}
            @if($user->foto)

                <img src="{{ asset('fotoprofil/' . $user->foto) }}" class="foto-profil">

            @else

                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="foto-profil">

            @endif

            {{-- NAMA --}}
            <div class="profil-item">

                <label>Nama</label>

                <div class="profil-value">
                    {{ $user->name }}
                </div>

            </div>

            {{-- EMAIL --}}
            <div class="profil-item">

                <label>Email</label>

                <div class="profil-value">
                    {{ $user->email }}
                </div>

            </div>

            {{-- TANGGAL --}}
            <div class="profil-item">

                <label>Tanggal Bergabung</label>

                <div class="profil-value">
                    {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                </div>

            </div>

            {{-- BUTTON EDIT --}}
            <a href="/editprofilpengguna" class="btn-edit">

                Edit Profil

            </a>

        </div>

    </div>

@endsection