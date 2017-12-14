<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
  protected $table = 'datasets';
  protected $primatyKey = 'id';
  protected $incrementing = true;
  protected $dates = ['deleted_at'];

  public function publication(){
    return $this->belongsTo('App\Publication');
  }

  public function requests(){
    return $this->hasMany('App\DatasetRequest');
  }
}
