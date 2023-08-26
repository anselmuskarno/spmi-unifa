<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function hapusUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        $request->session()->flash('berhasil', 'Data Berhasil dihapus! ');
        return redirect('/userAdmin');
    }

    public function updateUser(Request $request, $id)
    {

        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required'
        ]);

        $user           = User::find($id);
        $user->username    = $validateData['username'];
        $user->password  = $validateData['password'];
        $user->jabatan  = $validateData['jabatan'];
        $user->save();
        $request->session()->flash('berhasil', 'Data Berhasil diedit! ');
        return redirect('/userAdmin');
    }

    public function tambahUser(Request $request)
    {
        $pertanyaan = User::where([
            'username' => $request->username
        ])->count();
        $kaprodi = User::where([
            'jabatan' => $request->jabatan
        ])->count();
        if ($pertanyaan > 0) {
            $request->session()->flash('error', 'Data Gagal ditambahkan! Username sudah ada!');
            return redirect('/userAdmin');
        }
        if ($kaprodi > 0) {
            $request->session()->flash('error', 'Data Gagal ditambahkan! Kaprodi sudah ada!');
            return redirect('/userAdmin');
        }

        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
        ]);

        User::create($validateData);

        // $guru->save();
        $request->session()->flash('berhasil', 'Data Berhasil ditambahkan! ');
        return redirect('/userAdmin');
    }
}
