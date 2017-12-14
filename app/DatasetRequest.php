<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatasetRequest extends Model
{
  public $table = 'dataset_request';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];

  public function dataset(){
    return $this->belongsTo('App\Dataset');
  }
}
