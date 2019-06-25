<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table= 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_jurusan',
        'id_kelas',
        'nama',
        'NIS',
        'NISN',
        'jenis_kelamin',
        'agama',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
        'ayah',
        'ibu',
        'no_telepon',
        'id_user',
        'id'
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'id_jurusan');
    }
}
