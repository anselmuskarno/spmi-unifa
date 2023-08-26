<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hasil;
use Illuminate\Support\Facades\Storage;


class HasilController extends Controller
{
    public function hapusHasil($id)
    {
        $hasil = Hasil::find($id);
        $hasil->delete();

        return redirect('/hasilAdmin');
    }

    public function updateHasil(Request $request, $id)
    {

        $validateData = $request->validate([
            'referensi' => 'required',
            'pertanyaan' => 'required',
            'bukti' => 'required',
            'keterangan' => 'required',
            'pengirim' => 'required',
            'tipe_audit' => 'required',
            'nama_prodi' => 'required',
            'standar_yg_digunakan' => 'required',
            'ruang_lingkup' => 'required',
            'tanggal_audit' => 'required',
            'ketua_audit' => 'required',
            'audit' => 'required',
            'auditee' => 'required'
        ]);

        $hasil           = Hasil::find($id);
        $hasil->username    = $validateData['username'];
        $hasil->password  = $validateData['password'];
        $hasil->jabatan  = $validateData['jabatan'];
        $hasil->save();
        return redirect('/hasilAdmin');
    }

    public function tambahHasil(Request $request)
    {
        // return  $request->jabatan;
        for ($ulang = 1; $ulang < $request->totalData + 1; $ulang++) {
            $validateData1 = $request->validate([
                'referensi' . $ulang => '',
                'pertanyaan' . $ulang => '',
                'bukti' . $ulang => '',
                'keterangan' . $ulang => '',
                'evaluasi' . $ulang => '',
            ]);

            $validateData = $request->validate([
                'referensi' => '',
                'pertanyaan' => '',
                'bukti' => '',
                'keterangan' => '',
                'pengirim' => '',
                'tipe_audit' => '',
                'nama_prodi' => '',
                'standar_yg_digunakan' => '',
                'ruang_lingkup' => '',
                'tanggal_audit' => '',
                'ketua_audit' => '',
                'audit' => '',
                'auditee' => '',
                'evaluasi' => '',
                'jabatan' => ''
            ]);

            $validateData['referensi'] =  $validateData1['referensi' . $ulang];
            $validateData['pertanyaan']  =  $validateData1['pertanyaan' . $ulang];
            $validateData['bukti']  =  $validateData1['bukti' . $ulang];
            $validateData['keterangan']  =  $validateData1['keterangan' . $ulang];
            $validateData['evaluasi']  =  $validateData1['evaluasi' . $ulang];
            // return $validateData['referensi'] = "ansel";
            // return 'ok';
            Hasil::create($validateData);
        }


        // $guru->save();
        return redirect('/hasilKaprodi');
    }

    public function tambahHasilDosen(Request $request)
    {
        // return  $request->jabatan;
        for ($ulang = 1; $ulang < $request->totalData + 1; $ulang++) {
            $validateData1 = $request->validate([
                'referensi' . $ulang => '',
                'pertanyaan' . $ulang => '',
                'bukti' . $ulang => '',
                'keterangan' . $ulang => '',
                'evaluasi' . $ulang => '',
                'file_bukti' . $ulang => '',
            ]);

            $validateData = $request->validate([
                'referensi' => '',
                'pertanyaan' => '',
                'bukti' => '',
                'keterangan' => '',
                'pengirim' => '',
                'tipe_audit' => '',
                'nama_prodi' => '',
                'standar_yg_digunakan' => '',
                'ruang_lingkup' => '',
                'tanggal_audit' => '',
                'ketua_audit' => '',
                'audit' => '',
                'auditee' => '',
                'evaluasi' => '',
                'jabatan' => '',
                'file_bukti' => ''
            ]);

            if ($request->hasFile('file_bukti' . $ulang)) {
                $path = $request->file('file_bukti' . $ulang)->store('upload_file_bukti');
            } else {
                $path = 'kosong';
            }
            // return 'Tidak Ada file diupload';
            $validateData['referensi'] =  $validateData1['referensi' . $ulang];
            $validateData['pertanyaan']  =  $validateData1['pertanyaan' . $ulang];
            $validateData['bukti']  =  $validateData1['bukti' . $ulang];
            $validateData['keterangan']  =  $validateData1['keterangan' . $ulang];
            $validateData['evaluasi']  =  $validateData1['evaluasi' . $ulang];
            $validateData['file_bukti']  =  $path;
            // return $validateData['referensi'] = "ansel";
            // return 'ok';

            Hasil::create($validateData);
        }


        // $guru->save();
        return redirect('/hasilDosen');
    }
}
