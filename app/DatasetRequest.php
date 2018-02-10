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

  const PENDING = 1;
  const ACCEPTED = 2;
  const REFUSED = 3;
  private $status_language = [
    1   => 'pending',
    2   => 'accepted',
    3   => 'refused',
  ];
  public function get_status(){
    return $this->status_language[$this->status];
  }
}
