@extends('masterpengguna')

@section('konten')

    <style>
        .edit-container {
            padding: 50px 60px;
            display: flex;
            justify-content: center;
        }

        .edit-card {
            background: white;
            width: 650px;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .judul {
            text-align: center;
            font-size: 32px;
            color: #173B5E;
            margin-bottom: 30px;
        }

        .foto-profil {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: auto;
            border: 5px solid #1979B7;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #173B5E;
        }

        .form-control {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .btn-simpan {
            background: #1979B7;
            color: white;
            border: none;
            padding: 14px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
        }

        .btn-simpan:hover {
            background: #125d8d;
        }
    </style>

    <div class="edit-container">

        <div class="edit-card">

            <h1 class="judul">
                Edit Profil
            </h1>

            <form action="/updateprofilpengguna" method="POST" enctype="multipart/form-data">

                @csrf

                {{-- FOTO --}}
                @if($user->foto)

                    <img src="{{ asset('fotoprofil/' . $user->foto) }}" class="foto-profil">

                @else

                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="foto-profil">

                @endif

                <div class="form-group">

                    <label>Foto Profil</label>

                    <input type="file" name="foto" class="form-control">

                </div>

                {{-- NAMA --}}
                <div class="form-group">

                    <label>Nama</label>

                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">

                </div>

                {{-- EMAIL --}}
                <div class="form-group">

                    <label>Email</label>

                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">

                </div>

                <button type="submit" class="btn-simpan">

                    Simpan Perubahan

                </button>

            </form>

        </div>

    </div>

@endsection