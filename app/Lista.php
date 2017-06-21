<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public function filmes()
    {
    return $this->belongsToMany('App\Filme')
      ->withTimestamps();
    }
}
