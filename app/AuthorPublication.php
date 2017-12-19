<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorPublication extends Model{
  public $table = 'author_publication';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];
}
