<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Riwayat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogAdminController extends Controller
{
    // ================= DASHBOARD =================
    public function dashboard()
    {
        $totalKegiatan = Kegiatan::count();
        $totalVolunteer = Riwayat::count();
        $totalMenunggu = Riwayat::where('status', 'Menunggu')->count();

        return view('admin.dashboard', compact('totalKegiatan', 'totalVolunteer', 'totalMenunggu'));
    }

    // ================= KELOLA KEGIATAN =================

    // Menampilkan seluruh kegiatan
    public function kegiatan()
    {
        $kegiatans = Kegiatan::orderBy('tanggal', 'desc')->paginate(10);

        return view('admin.kegiatanadmin', compact('kegiatans'));
    }

    // Form tambah kegiatan
    public function tambahKegiatan()
    {
        return view('admin.tambahkegiatan');
    }

    // Simpan kegiatan baru
    public function storeKegiatan(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'batas_waktu_pendaftaran' => ['nullable', 'date', 'before_or_equal:tanggal'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'kuota_total' => ['required', 'integer', 'min:1'],
        ]);

        Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function updateKegiatan(Request $request, $id): RedirectResponse
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $validated = $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tanggal' => ['required', 'date'],
            'batas_waktu_pendaftaran' => ['nullable', 'date', 'before_or_equal:tanggal'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'kuota_total' => ['required', 'integer', 'min:1'],
        ]);

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    // Form edit kegiatan
    public function editKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('admin.editkegiatan', compact('kegiatan'));
    }

    // Hapus kegiatan
    public function hapusKegiatan($id): RedirectResponse
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil dihapus.');
    }

    // ================= KELOLA VOLUNTEER ======

    // Menampilkan seluruh pendaftar volunteer
    public function volunteer()
    {
        $riwayats = Riwayat::with(['user'])
            ->orderBy('id_riwayat', 'desc')
            ->paginate(15);

        return view('admin.pendaftar', compact('riwayats'));
    }

    // Terima volunteer
    public function terimaVolunteer($id): RedirectResponse
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->update(['status' => 'Diterima']);

        return back()->with('success', 'Volunteer diterima.');
    }

    // Tolak volunteer
    public function tolakVolunteer($id): RedirectResponse
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->update(['status' => 'Ditolak']);

        $riwayat = DB::table('riwayat')
            ->where('id', $id)
            ->first();

        DB::table('kegiatan')
            ->where('nama_kegiatan', $riwayat->nama_kegiatan)
            ->decrement('kuota_terisi');
        return back()->with('success', 'Volunteer ditolak.');
    }
}