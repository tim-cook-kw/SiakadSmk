<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{

    protected $fillable = [
        'id_jurusan',
        'nama_kelas',
        'level'
    ];
    protected $table = 'kelas';

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'id_jurusan');
    }
}
