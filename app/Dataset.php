<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
  public $table = 'datasets';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];

  public function publication(){
    return $this->belongsTo('App\Publication');
  }

  public function requests(){
    return $this->hasMany('App\DatasetRequest');
  }
}
