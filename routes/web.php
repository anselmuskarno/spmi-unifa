<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Pertanyaan;
use App\Models\Informasi;
use App\Models\Hasil;

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/cariKata', [BahasaController::class, 'cariKata']);
Route::post('/tambahBahasa', [BahasaController::class, 'tambahBahasa']);
Route::post('/editBahasa/{id}', [BahasaController::class, 'updateBahasa']);
Route::get('/hapusBahasa/{id}', [BahasaController::class, 'hapusBahasa']);

//Halaman Utama
Route::get('/', function () {
    return view('home');
});

//Dashboard Kaprodi
Route::get('/dashboardKaprodi', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('kaprodi/index', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::where('pengirim',  session('username'))->count(),
        'hasil' => Hasil::All()
    ]);
});

Route::get('/ujianKaprodi', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('kaprodi/ujian', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::where('pengirim',  session('username'))->count(),
        'hasil' => Hasil::All()
    ]);
});

Route::get('/hasilKaprodi', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('kaprodi/hasil', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::where('pengirim',  session('username'))->count(),
        'hasil' => Hasil::where('pengirim',  session('username'))->get()
    ]);
});


//Dashboard Dosen
Route::get('/dashboardDosen', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('dosen/index', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::where('pengirim',  session('username'))->count(),
        'hasil' => Hasil::All()
    ]);
});

Route::get('/ujianDosen', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('dosen/ujian', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::where('pengirim',  session('username'))->count(),
        'hasil' => Hasil::All()
    ]);
});

Route::get('/hasilDosen', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('dosen/hasil', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::where('pengirim',  session('username'))->count(),
        'hasil' => Hasil::where('pengirim',  session('username'))->get()
    ]);
});

//Dashboard Admin
Route::get('/dashboardAdmin', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('admin/index', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::count(),
        'hasil' => Hasil::All()
    ]);
});

Route::post('/tambahPertanyaan', [PertanyaanController::class, 'tambahPertanyaan']);
Route::post('/editPertanyaan/{id}', [PertanyaanController::class, 'updatePertanyaan']);
Route::get('/hapusPertanyaan/{id}', [PertanyaanController::class, 'hapusPertanyaan']);
Route::get('/pertanyaanAdmin', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('admin/pertanyaan', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::count(),
        'hasil' => Hasil::All()
    ]);
});

Route::post('/tambahHasil', [HasilController::class, 'tambahHasil']);
Route::post('/tambahHasilDosen', [HasilController::class, 'tambahHasilDosen']);
Route::post('/editHasil/{id}', [HasilController::class, 'updateHasil']);
Route::get('/hapusHasil/{id}', [HasilController::class, 'hapusHasil']);
Route::get('/hasilAdmin', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('admin/hasil', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::count(),
        'hasil' => Hasil::All()
    ]);
});


Route::post('/tambahUser', [UserController::class, 'tambahUser']);
Route::post('/editUser/{id}', [UserController::class, 'updateUser']);
Route::get('/hapusUser/{id}', [UserController::class, 'hapusUser']);
Route::get('/userAdmin', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('admin/user', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::count(),
        'hasil' => Hasil::All()
    ]);
});

Route::post('/tambahInformasi', [InformasiController::class, 'tambahInformasi']);
Route::post('/editInformasi/{id}', [InformasiController::class, 'updateInformasi']);
Route::get('/hapusInformasi/{id}', [InformasiController::class, 'hapusInformasi']);
Route::get('/informasiAdmin', function () {
    if (session('username') == null) {
        return redirect('/');
    }
    return view('admin/informasi', [
        'totalUser' => User::count(),
        'user' => User::All(),
        'totalPertanyaan' => Pertanyaan::count(),
        'pertanyaan' => Pertanyaan::All(),
        'totalInformasi' => Informasi::count(),
        'informasi' => Informasi::All(),
        'totalHasil' => Hasil::count(),
        'hasil' => Hasil::All()
    ]);
});
