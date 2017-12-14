<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatasetRequest extends Model
{
  protected $table = 'dataset_request';
  protected $primatyKey = 'id';
  protected $incrementing = true;
  protected $dates = ['deleted_at'];

  public function dataset(){
    return $this->belongsTo('App\Dataset');
  }
}
