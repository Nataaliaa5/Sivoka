@extends('masteradmin')

@section('konten')

    <style>
        .form-wrapper {
            padding: 40px 20px;
            max-width: 700px;
            margin: 0 auto;
        }

        .form-wrapper h1 {
            font-size: 26px;
            color: #1b3556;
            margin-bottom: 25px;
        }

        .form-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #1b3556;
            margin-bottom: 6px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn-simpan {
            background-color: #2196f3;
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-simpan:hover {
            background-color: #1565c0;
        }

        .btn-batal {
            background-color: #e0e0e0;
            color: #333;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-size: 15px;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
            transition: 0.3s;
        }

        .btn-batal:hover {
            background-color: #ccc;
        }

        .alert-danger {
            background-color: #fdecea;
            color: #b71c1c;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .form-wrapper {
                padding: 25px 15px;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>

    <div class="form-wrapper">

        <h1>Tambah Kegiatan Baru</h1>

        <div class="form-card">

            @if ($errors->any())
                <div class="alert-danger">
                    <ul style="margin: 0; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.kegiatan.store') }}" method="POST">
                @csrf

                <label class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan') }}" required>

                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>

                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}">

                <label class="form-label">Kuota Peserta</label>
                <input type="number" name="kuota_total" class="form-control" value="{{ old('kuota_total') }}" min="1"
                    required>

                <label class="form-label">Batas Waktu Pendaftaran</label>
                <input type="date" name="batas_waktu_pendaftaran" class="form-control"
                    value="{{ old('batas_waktu_pendaftaran') }}">

                <label class="form-label">Deskripsi Kegiatan</label>
                <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>

                <a href="{{ route('admin.kegiatan') }}" class="btn-batal">Batal</a>
                <button type="submit" class="btn-simpan">Simpan</button>

            </form>

        </div>

    </div>

@endsection