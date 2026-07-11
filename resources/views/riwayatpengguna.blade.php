@extends('masterpengguna')

@section('konten')

    <style>
        .riwayat-container {
            padding: 40px 60px;
        }

        .judul {
            font-size: 28px;
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
        }

        thead th {
            padding: 15px;
            text-align: center;
        }

        tbody td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background: #f5f5f5;
        }

        .status-menunggu {
            color: #b5c92e;
            font-weight: bold;
        }

        .status-diterima {
            color: green;
            font-weight: bold;
        }

        .status-ditolak {
            color: red;
            font-weight: bold;
        }

        .status-dibatalkan {
            color: gray;
            font-weight: bold;
        }

        .btn-batal {
            background: #b22222;
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-batal:hover {
            background: #8b1a1a;
        }
    </style>

    <div class="riwayat-container">

        <h1 class="judul">
            Daftar Riwayat Kegiatan Volunteer Mahasiswa
        </h1>

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($riwayat as $index => $riw)

                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td>{{ $riw->nama_kegiatan }}</td>

                            <td>{{ $riw->tanggal }}</td>

                            <td>
                                @if($riw->status == 'Menunggu')
                                    <span class="status-menunggu">
                                        {{ $riw->status }}
                                    </span>

                                @elseif($riw->status == 'Diterima')
                                    <span class="status-diterima">
                                        {{ $riw->status }}
                                    </span>

                                @elseif($riw->status == 'Dibatalkan')
                                    <span class="status-dibatalkan">
                                        {{ $riw->status }}
                                    </span>

                                @else
                                    <span class="status-ditolak">
                                        {{ $riw->status }}
                                    </span>
                                @endif
                            </td>

                            <td>

                                @if($riw->status == 'Menunggu')

                                    <a href="{{ route('riwayat.batalkan', $riw->id_riwayat) }}" class="btn-batal"
                                        onclick="return confirm('Apakah Anda yakin ingin membatalkan pendaftaran ini?')">
                                        Batalkan
                                    </a>

                                @else

                                    -

                                @endif

                            </td>


                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">
                                Data riwayat belum ada
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection