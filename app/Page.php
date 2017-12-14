<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  public $table = 'pages';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];
}
