<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{

    protected $fillable = [
        'id_siswa',
        'id_kelas',
        'UH1',
        'UTS',
        'UH2',
        'UAS',
        'semester'
    ];
    protected $table = 'nilai';

}
