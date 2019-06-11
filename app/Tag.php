<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{ 
    protected $fillable = [
        'id',
        'nama'
    ];
    protected $table = 'tags';
    public function berita()
    {
        return $this->hasOne('App\Berita');
    }
}

