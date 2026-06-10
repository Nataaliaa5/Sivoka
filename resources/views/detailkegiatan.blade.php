@extends('masterpengguna')

@section('konten')

    <style>
        .detail-container {
            padding: 50px 60px;
        }

        .detail-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
        }

        .detail-title {
            font-size: 32px;
            font-weight: 700;
            color: #173B5E;
            margin-bottom: 25px;
        }

        .detail-item {
            margin-bottom: 20px;
        }

        .detail-label {
            font-weight: 700;
            color: #1979B7;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .detail-value {
            font-size: 17px;
            color: #333;
            line-height: 1.7;
        }

        .kuota-penuh {
            color: red;
            font-weight: bold;
        }

        .btn-daftar {
            display: inline-block;
            margin-top: 25px;
            background: #1979B7;
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
            font-weight: 600;
        }

        .btn-daftar:hover {
            background: #125d8d;
        }

        .btn-penuh {
            margin-top: 25px;
            background: red;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: not-allowed;
        }

        .btn-kembali {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #173B5E;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
            transition: 0.3s;
        }

        .btn-kembali:hover {
            color: #1979B7;
            transform: translateX(-3px);
        }
    </style>

    <div class="detail-container">

        <a href="{{ url('/kegiatanpengguna') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <div class="detail-card">
            <h2 class="detail-title">{{ $kegiatan->nama_kegiatan }}</h2>

            <div class="detail-item">
                <div class="detail-label">Deskripsi:</div>
                <div class="detail-value">{{ $kegiatan->deskripsi }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Tanggal:</div>
                <div class="detail-value">{{ $kegiatan->tanggal }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Lokasi:</div>
                <div class="detail-value">{{ $kegiatan->lokasi }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Kuota:</div>
                <div class="detail-value">
                    @if ($kegiatan->kuota_terisi >= $kegiatan->kuota_total)
                        <span class="kuota-penuh">
                            {{ $kegiatan->kuota_terisi }} / {{ $kegiatan->kuota_total }} (Penuh)
                        </span>
                    @else
                        {{ $kegiatan->kuota_terisi }} / {{ $kegiatan->kuota_total }}
                    @endif
                </div>
            </div>

            @if ($kegiatan->kuota_terisi >= $kegiatan->kuota_total)
                <button class="btn-penuh" disabled>Kuota Penuh</button>
            @else
                <a href="{{ url('/riwayatpengguna') }}" class="btn-daftar">Daftar</a>
            @endif

        </div>

    </div>

@endsection