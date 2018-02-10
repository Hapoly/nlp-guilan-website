<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  public $table = 'pages';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];


  const PUBLISHED = 1;
  const UNPUBLISHED = 2;
  public $status_language = [
    1 => 'published',
    2 => 'unpublished',
  ];
  public function get_status(){
    return $this->status_language[$this->status];
  }
}
