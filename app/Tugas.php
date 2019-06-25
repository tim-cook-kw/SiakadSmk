<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable =[
        'id_guru',
        'id_kelas',
        'id_mapel',
        'tugas',
        'file'
    ];
}
