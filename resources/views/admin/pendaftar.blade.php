@extends('masteradmin')

@section('konten')

    <style>
        .volunteer-wrapper {
            padding: 40px 20px;
        }

        .volunteer-header {
            margin-bottom: 25px;
        }

        .volunteer-header h1 {
            font-size: 28px;
            color: #1b3556;
            margin: 0;
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
            white-space: nowrap;
        }

        .badge-menunggu {
            background-color: #ff9800;
        }

        .badge-diterima {
            background-color: #4caf50;
        }

        .badge-ditolak {
            background-color: #f44336;
        }

        .badge-dibatalkan {
            background-color: #9e9e9e;
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
            color: #fff;
        }

        .btn-terima {
            background-color: #4caf50;
        }

        .btn-terima:hover {
            background-color: #388e3c;
        }

        .btn-tolak {
            background-color: #f44336;
        }

        .btn-tolak:hover {
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
            .volunteer-wrapper {
                padding: 25px 15px;
            }

            .volunteer-header h1 {
                font-size: 22px;
            }
        }

        @media (max-width: 480px) {
            table {
                min-width: 600px;
            }
        }
    </style>

    <div class="volunteer-wrapper">

        <div class="volunteer-header">
            <h1>Daftar Pendaftar Volunteer</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-wrapper">

            @if ($riwayats->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayats as $index => $riwayat)
                            <tr>
                                <td>{{ $riwayats->firstItem() + $index }}</td>
                                <td>{{ $riwayat->user->name ?? '-' }}</td>
                                <td>{{ $riwayat->nama_kegiatan }}</td>
                                <td>{{ $riwayat->tanggal ? $riwayat->tanggal->format('d F Y') : '-' }}</td>
                                <td>
                                    @php
                                        $badgeClass = match ($riwayat->status) {
                                            'Menunggu' => 'badge-menunggu',
                                            'Diterima' => 'badge-diterima',
                                            'Ditolak' => 'badge-ditolak',
                                            'Dibatalkan' => 'badge-dibatalkan',
                                            default => 'badge-menunggu',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $riwayat->status }}</span>
                                </td>
                                <td>
                                    @if ($riwayat->status === 'Menunggu')
                                        <div class="aksi-group">
                                            <form action="{{ route('admin.volunteer.terima', $riwayat->id_riwayat) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn-aksi btn-terima">Terima</button>
                                            </form>
                                            <form action="{{ route('admin.volunteer.tolak', $riwayat->id_riwayat) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn-aksi btn-tolak">Tolak</button>
                                            </form>
                                        </div>
                                    @else
                                        <span style="color: #999; font-size: 13px;">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-wrapper">
                    {{ $riwayats->links() }}
                </div>

            @else
                <div class="empty-state">
                    Belum ada pendaftar volunteer.
                </div>
            @endif

        </div>

    </div>

@endsection