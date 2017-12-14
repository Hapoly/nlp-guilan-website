<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    protected $primatyKey = 'id';
    protected $incrementing = true;
    protected $dates = ['deleted_at'];

    public function authors(){
      return $this->belongsToMany('App\Author');
    }
}
