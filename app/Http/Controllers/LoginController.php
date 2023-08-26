<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

class LoginController extends Controller
{
    public function index()
    {
        // mengarah pada file login yang ada di folder view
        return view('login', [
            'judul' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // return User::where('jabatan', $request->jabatan)->count();
        if (User::where('jabatan', $request->jabatan)->count() > 0) {
            $user = User::where('jabatan', $request->jabatan)->first();
            $usernameInput = $request->username;
            $passwordInput = $request->password;
            if ($user->jabatan == 'admin') {
                if ($usernameInput == $user->username && $passwordInput == $user->password) {
                    $request->session()->regenerate();
                    $request->session()->put('username', $user->username);
                    $request->session()->put('id', $user->id);
                    $request->session()->flash('berhasil', 'Login Berhasil! Selamat Datang Admin ');
                    return redirect()->intended('/dashboardAdmin');
                }
            } else if ($user->jabatan == 'kaprodi') {
                if ($usernameInput == $user->username && $passwordInput == $user->password) {
                    $request->session()->regenerate();
                    $request->session()->put('username', $user->username);
                    $request->session()->put('id', $user->id);
                    $request->session()->flash('berhasil', 'Login Berhasil! Selamat Datang ');
                    return redirect()->intended('/dashboardKaprodi');
                }
            } else if ($user->jabatan == 'dosen') {
                if ($usernameInput == $user->username && $passwordInput == $user->password) {
                    $request->session()->regenerate();
                    $request->session()->put('username', $user->username);
                    $request->session()->put('jabatan', $user->jabatan);
                    $request->session()->put('id', $user->id);
                    $request->session()->flash('berhasil', 'Login Berhasil! Selamat Datang ');
                    return redirect()->intended('/dashboardDosen');
                }
            }
        }
        $request->session()->flash('error', 'Username atau password salah !');
        return redirect()->intended('/');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('username');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('berhasil', 'Logout Berhasil !');
        return redirect('/');
    }

    public function hapusSiswa($id)
    {
        $pemasukan = User::find($id);
        $pemasukan->delete();

        return redirect('/siswa');
    }

    public function hapusGuru($id)
    {
        $pemasukan = User::find($id);
        $pemasukan->delete();

        return redirect('/guruAdmin');
    }

    public function updateSiswa(Request $request, $id)
    {
        $siswa           = User::find($id);
        $passwordLama = $siswa->password;
        $siswa->nama    = $request->nama;
        $siswa->username  = $request->username;
        if ($request->password != null) {
            $siswa->password  = $request->password;
        } else {
            $siswa->password =  $siswa->password;
        }
        $siswa->save();
        return redirect('/siswa');
    }
}
