@extends('masteradmin')

@section('konten')

    <style>
        .kegiatan-wrapper {
            padding: 40px 20px;
        }

        .kegiatan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .kegiatan-header h1 {
            font-size: 28px;
            color: #1b3556;
            margin: 0;
        }

        .btn-tambah {
            background-color: #2196f3;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            transition: 0.3s;
            white-space: nowrap;
            border: none;
            cursor: pointer;
        }

        .btn-tambah:hover {
            background-color: #1565c0;
            color: #fff;
        }

        .table-wrapper {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead th {
            background-color: #1b3556;
            color: #fff;
            padding: 12px 15px;
            text-align: left;
            font-size: 14px;
            white-space: nowrap;
        }

        tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
            vertical-align: middle;
        }

        tbody tr:hover {
            background-color: #f5f9ff;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #fff;
            display: inline-block;
        }

        .badge-aman {
            background-color: #4caf50;
        }

        .badge-hampir {
            background-color: #f44336;
        }

        .aksi-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-aksi {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-detail {
            background-color: #2196f3;
            color: #fff;
        }

        .btn-detail:hover {
            background-color: #1565c0;
            color: #fff;
        }

        .btn-hapus {
            background-color: #f44336;
            color: #fff;
        }

        .btn-hapus:hover {
            background-color: #c62828;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #777;
            font-size: 15px;
        }

        .pagination-wrapper {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .kegiatan-wrapper {
                padding: 25px 15px;
            }

            .kegiatan-header h1 {
                font-size: 22px;
            }
        }

        @media (max-width: 480px) {
            .kegiatan-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-tambah {
                width: 100%;
                text-align: center;
            }

            table {
                min-width: 600px;
            }
        }
    </style>

    <div class="kegiatan-wrapper">

        <div class="kegiatan-header">
            <h1>Kelola Kegiatan Volunteer</h1>
            <a href="{{ route('admin.kegiatan.tambah') }}" class="btn-tambah">
                <i class="bi bi-plus-circle"></i> Tambah Kegiatan
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-wrapper">

            @if ($kegiatans->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Kuota</th>
                            <th>Deadline</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatans as $index => $kegiatan)
                            <tr>
                                <td>{{ $kegiatans->firstItem() + $index }}</td>
                                <td>{{ $kegiatan->nama_kegiatan }}</td>
                                <td>{{ $kegiatan->tanggal->format('d F Y') }}</td>
                                <td>
                                    <span class="badge {{ $kegiatan->sisaKuota() > 0 ? 'badge-aman' : 'badge-hampir' }}">
                                        {{ $kegiatan->sisaKuota() }} / {{ $kegiatan->kuota_total }}
                                    </span>
                                </td>
                                <td>
                                    {{ $kegiatan->batas_waktu_pendaftaran ? $kegiatan->batas_waktu_pendaftaran->format('d F Y') : '-' }}
                                </td>
                                <td>
                                    <div class="aksi-group">
                                        <a href="{{ route('admin.kegiatan.edit', $kegiatan->id_kegiatan) }}"
                                            class="btn-aksi btn-detail">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.kegiatan.hapus', $kegiatan->id_kegiatan) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-aksi btn-hapus">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $kegiatans->links() }}
                </div>

            @else
                <div class="empty-state">
                    Belum ada kegiatan yang terdaftar. Klik "Tambah Kegiatan" untuk menambahkan.
                </div>
            @endif

        </div>

    </div>

@endsection