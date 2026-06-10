<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogPenggunaController extends Controller
{
    public function index()
    {
        return view('berandapengguna');
    }

    public function kegiatan()
    {
        $kegiatan = DB::table('kegiatan')->paginate(5);
        return view('kegiatanpengguna', ['kegiatan' => $kegiatan]);
    }

    public function detailkegiatan($id)
    {
        $kegiatan = DB::table('kegiatan')->where('id_kegiatan', $id)->first();
        return view('detailkegiatan', ['kegiatan' => $kegiatan]);
    }

    public function riwayat()
    {
        $riwayat = DB::table('riwayat')->paginate(5);
        return view('riwayatpengguna', ['riwayat' => $riwayat]);
    }

    public function batalkan($id)
    {
        DB::table('riwayat')->where('id', $id)->update(['status' => 'Dibatalkan']);
        return redirect('/riwayatpengguna');
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

