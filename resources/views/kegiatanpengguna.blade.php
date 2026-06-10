@extends('masterpengguna')

@section('konten')

    <style>
        .kegiatan-container {
            padding: 40px 60px;
        }

        .judul {
            font-size: 30px;
            font-weight: bold;
            color: #173B5E;
            margin-bottom: 25px;
        }

        .table-wrapper {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #5f9ac2;
            color: white;
            font-size: 28px;
        }

        thead th {
            padding: 15px;
            text-align: center;
        }

        tbody td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 25px;
        }

        tbody tr:hover {
            background: #f5f5f5;
        }

        .btn-daftar {
            background: #1979B7;
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-daftar:hover {
            background: #125d8d;
        }

        .btn-detail {
            background: #1979B7;
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-detail:hover {
            background: #125d8d;
        }
    </style>

    <div class="kegiatan-container">

        <h1 class="judul">
            Daftar Kegiatan Volunteer Mahasiswa
        </h1>

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($kegiatan as $index => $keg)

                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td>{{ $keg->nama_kegiatan }}</td>

                            <td>{{ $keg->tanggal }}</td>

                            <td>{{ $keg->lokasi }}</td>

                            <td>
                                @if ($keg->kuota_terisi >= $keg->kuota_total)
                                    <span class="kuota-penuh" style="color: red;">
                                        {{ $keg->kuota_terisi }} / {{ $keg->kuota_total }}
                                    </span>
                                @else
                                    {{ $keg->kuota_terisi }} / {{ $keg->kuota_total }}
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('kegiatan.detail', $keg->id_kegiatan) }}" class="btn-detail">
                                    Detail
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">
                                Data kegiatan belum ada
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection