<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{

    protected $fillable = [
        'id_tags',
        'judul',
        'isi',
        'file',
        'tanggal_terbit'
    ];
    protected $table = 'berita';

    public function tag()
    {
        return $this->belongsTo('App\Tags', 'id_tags');
    }
}
