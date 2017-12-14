<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  public $table = 'authors';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];

  public function publications(){
      return $this->belongsToMany('App\Publication');
  }

}
