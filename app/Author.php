<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected $table = 'authors';
  protected $primatyKey = 'id';
  protected $incrementing = true;
  protected $dates = ['deleted_at'];

  public function publications(){
      return $this->belongsToMany('App\Publication');
  }

}
