<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public $table = 'publications';
    public $primatyKey = 'id';
    public $incrementing = true;
    public $dates = ['deleted_at'];

    public function authors(){
      return $this->belongsToMany('App\Author');
    }

    public function datasets(){
      return $this->hasMany('App\Dataset');
    }
}
