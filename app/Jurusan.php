<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'nama_jurusan',
        'visi',
        'misi'
    ];
    protected $table = 'jurusan';

// has one mapel
    public function mapel()
    {
        return $this->hasOne('App\Mapel');
    }

}
