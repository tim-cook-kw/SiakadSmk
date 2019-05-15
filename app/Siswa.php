<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table= 'siswa';
    protected $primaryKey = 'id';
    
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
