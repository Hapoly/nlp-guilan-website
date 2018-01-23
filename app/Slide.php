<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
  public $table = 'slides';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];

  public $status_language = [
    1   => "active",
    2   => "inactive",
  ];

  public function get_status(){
    return $this->status_language[$this->status];
  }
}
