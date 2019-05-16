<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoSekolah extends Model
{
    protected $table = 'infosekolah';
    protected $fillable = [
        'nama',
        'web',
        'email',
        'nama_kepsek',
        'nip_kepsek',
        'logo',
        'visi',
        'misi',
        'alamat',
        'no_telepon',

    ];
}
