<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
  public $table = 'publication_author';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];
}
