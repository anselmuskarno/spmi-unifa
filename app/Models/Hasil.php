<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Hasil extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'referensi',
        'pertanyaan',
        'bukti',
        'keterangan',
        'pengirim',
        'tipe_audit',
        'nama_prodi',
        'standar_yg_digunakan',
        'ruang_lingkup',
        'tanggal_audit',
        'ketua_audit',
        'audit',
        'auditee',
        'evaluasi',
        'jabatan',
        'file_bukti'
    ];
}
