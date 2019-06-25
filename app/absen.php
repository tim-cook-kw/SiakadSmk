<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'id_siswa',
        'waktu',
        'keterangan',
        'id'
    ];
    protected $table = 'absensi_siswa';
}
