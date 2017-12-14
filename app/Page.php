<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  protected $table = 'pages';
  protected $primatyKey = 'id';
  protected $incrementing = true;
  protected $dates = ['deleted_at'];
}
