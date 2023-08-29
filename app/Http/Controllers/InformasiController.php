<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Facades\Storage;


class InformasiController extends Controller
{

    public function updateInformasi(Request $request, $id)
    {

        $validateData = $request->validate([
            'audit' => 'required',
            'nama_prodi' => 'required',
            'ruang_lingkup' => 'required',
            'tipe_audit' => 'required',
            'standar_yg_digunakan' => 'required',
            'tanggal_audit' => 'required',
            'auditee' => 'required',
            'ketua_audit' => 'required'
        ]);

        $informasi           = Informasi::find($id);
        $informasi->audit    = $validateData['audit'];
        $informasi->nama_prodi  = $validateData['nama_prodi'];
        $informasi->ruang_lingkup  = $validateData['ruang_lingkup'];
        $informasi->tipe_audit  = $validateData['tipe_audit'];
        $informasi->standar_yg_digunakan  = $validateData['standar_yg_digunakan'];
        $informasi->tanggal_audit  = $validateData['tanggal_audit'];
        $informasi->auditee  = $validateData['auditee'];
        $informasi->ketua_audit  = $validateData['ketua_audit'];
        $informasi->save();
        $request->session()->flash('berhasil', 'Data Berhasil diubah! ');
        return redirect('/informasiAdmin');
    }

    public function tambahInformasi(Request $request)
    {

        $validateData = $request->validate([
            'audit' => 'required',
            'nama_prodi' => 'required',
            'ruang_lingkup' => 'required',
            'tipe_audit' => 'required',
            'standar_yg_digunakan' => 'required',
            'tanggal_audit' => 'required',
            'auditee' => 'required',
            'ketua_audit' => 'required'
        ]);

        Informasi::create($validateData);

        // $guru->save();
        $request->session()->flash('berhasil', 'Data Berhasil ditambahkan! ');
        return redirect('/informasiAdmin');
    }

    public function hapusInformasi(Request $request, $id)
    {
        $informasi = Informasi::find($id);
        $informasi->delete();
        $request->session()->flash('berhasil', 'Data Berhasil dihapus! ');
        return redirect('/informasiAdmin');
    }
}
