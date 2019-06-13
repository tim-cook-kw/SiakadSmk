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
        return $this->belongsTo('App\Tag', 'id_tags');
    }
}
