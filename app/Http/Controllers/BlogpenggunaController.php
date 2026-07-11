<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogPenggunaController extends Controller
{
    public function index()
    {
        $totalKegiatan = DB::table('kegiatan')->count();

        $pendaftaranSaya = DB::table('riwayat')
            ->where('id_user', auth()->id())
            ->count();

        $menunggu = DB::table('riwayat')
            ->where('id_user', auth()->id())
            ->where('status', 'Menunggu')
            ->count();

        return view('berandapengguna', compact(
            'totalKegiatan',
            'pendaftaranSaya',
            'menunggu'
        ));
    }

    public function kegiatan()
    {
        $kegiatan = DB::table('kegiatan')->get();
        return view('kegiatanpengguna', ['kegiatan' => $kegiatan]);
    }

    public function detailkegiatan($id)
    {
        $kegiatan = DB::table('kegiatan')
            ->where('id_kegiatan', $id)
            ->first();

        $cek = DB::table('riwayat')
            ->where('id_user', auth()->id())
            ->where('nama_kegiatan', $kegiatan->nama_kegiatan)
            ->whereNotIn('status', ['Dibatalkan', 'Ditolak'])
            ->exists();

        return view('detailkegiatan', [
            'kegiatan' => $kegiatan,
            'cek' => $cek
        ]);
    }

    public function daftarkegiatan($id)
    {
        $kegiatan = DB::table('kegiatan')
            ->where('id_kegiatan', $id)
            ->first();

        // Cek apakah kegiatan ada
        if (!$kegiatan) {
            return back()->with('error', 'Kegiatan tidak ditemukan.');
        }

        // Cek kuota
        if ($kegiatan->kuota_terisi >= $kegiatan->kuota_total) {
            return back()->with('error', 'Kuota kegiatan sudah penuh.');
        }

        // Cek apakah user sudah pernah mendaftar
        $cek = DB::table('riwayat')
            ->where('id_user', auth()->id())
            ->where('nama_kegiatan', $kegiatan->nama_kegiatan)
            ->whereNotIn('status', ['Dibatalkan', 'Ditolak'])
            ->exists();

        if ($cek) {
            return back()->with('error', 'Anda sudah mendaftar kegiatan ini.');
        }

        // Simpan riwayat
        DB::table('riwayat')->insert([
            'id_user' => auth()->id(),
            'nama_kegiatan' => $kegiatan->nama_kegiatan,
            'tanggal' => $kegiatan->tanggal,
            'status' => 'Menunggu',
        ]);

        // Tambah kuota terisi
        DB::table('kegiatan')
            ->where('id_kegiatan', $id)
            ->increment('kuota_terisi');

        return redirect('/riwayatpengguna')
            ->with('success', 'Pendaftaran berhasil! Silakan cek riwayat untuk melihat status pendaftaran Anda.');
    }
    public function riwayat()
    {
        $riwayat = DB::table('riwayat')
            ->where('id_user', auth()->id())
            ->get();

        return view('riwayatpengguna', compact('riwayat'));
    }

    public function batalkan($id)
    {
        $riwayat = DB::table('riwayat')
            ->where('id_riwayat', $id)
            ->first();

        DB::table('riwayat')
            ->where('id_riwayat', $id)
            ->update([
                'status' => 'Dibatalkan'
            ]);

        DB::table('kegiatan')
            ->where('nama_kegiatan', $riwayat->nama_kegiatan)
            ->decrement('kuota_terisi');
        return redirect('/riwayatpengguna')->with('success', 'Pendaftaran berhasil dibatalkan.');
    }

    public function profil()
    {
        $user = DB::table('users')->where('id', auth()->user()->id)->first();
        return view('profilpengguna', ['user' => $user]);
    }

    public function editprofil()
    {
        $user = Auth::user();

        return view('editprofilpengguna', compact('user'));
    }

    // UPDATE PROFIL
    public function updateprofil(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();

        // UPDATE NAMA
        $user->name = $request->name;

        // UPDATE EMAIL
        $user->email = $request->email;

        // UPDATE FOTO
        if ($request->hasFile('foto')) {

            $file = $request->file('foto');

            $namaFile = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('fotoprofil'), $namaFile);

            $user->foto = $namaFile;
        }

        $user->save();

        return redirect('/profilpengguna')
            ->with('success', 'Profil berhasil diperbarui');
    }

}

