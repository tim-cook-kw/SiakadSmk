<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table= 'guru';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'NIP',
        'id_kelas',
        'id_jurusan',
        'id_mapel',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telepon',
        'id_user'
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');

    }
}
