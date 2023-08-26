<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Storage;


class PertanyaanController extends Controller
{
    public function hapusPertanyaan(Request $request, $id)
    {
        $pertanyaaan = Pertanyaan::find($id);
        $pertanyaaan->delete();
        $request->session()->flash('berhasil', 'Data Berhasil dihapus! ');
        return redirect('/pertanyaanAdmin');
    }

    public function updatePertanyaan(Request $request, $id)
    {

        $validateData = $request->validate([
            'referensi' => 'required',
            'pertanyaan' => 'required',
            'bukti' => '',
            'keterangan' => '',
            'evaluasi' => ''
        ]);

        $pertanyaaan           = Pertanyaan::find($id);
        $pertanyaaan->referensi    = $validateData['referensi'];
        $pertanyaaan->pertanyaan  = $validateData['pertanyaan'];
        $pertanyaaan->bukti  = $validateData['bukti'];
        $pertanyaaan->keterangan  = $validateData['keterangan'];
        $pertanyaaan->evaluasi  = $validateData['evaluasi'];
        $pertanyaaan->save();
        $request->session()->flash('berhasil', 'Data Berhasil diedit! ');
        return redirect('/pertanyaanAdmin');
    }

    public function tambahPertanyaan(Request $request)
    {
        $pertanyaan = Pertanyaan::where([
            'pertanyaan' => $request->pertanyaan
        ])->count();
        if ($pertanyaan > 0) {
            $request->session()->flash('error', 'Data Gagal ditambahkan! Pertanyaan sudah ada!');
            return redirect('/pertanyaanAdmin');
        }

        $validateData = $request->validate([
            'referensi' => 'required',
            'pertanyaan' => 'required',
            'bukti' => '',
            'keterangan' => '',
            'evaluasi' => ''
        ]);

        Pertanyaan::create($validateData);
        $request->session()->flash('berhasil', 'Data Berhasil ditambahkan! ');
        // $guru->save();
        return redirect('/pertanyaanAdmin');
    }
}
