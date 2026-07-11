<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'tanggal',
        'batas_waktu_pendaftaran',
        'lokasi',
        'kuota_total',
        'kuota_terisi',
        'aksi',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'batas_waktu_pendaftaran' => 'date',
    ];

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'id_kegiatan', 'id_kegiatan');
    }

    public function sisaKuota(): int
    {
        return max(0, $this->kuota_total - ($this->kuota_terisi ?? 0));
    }

    public function sudahLewatDeadline(): bool
    {
        if (!$this->batas_waktu_pendaftaran) {
            return false;
        }

        return now()->startOfDay()->gt($this->batas_waktu_pendaftaran);
    }
}