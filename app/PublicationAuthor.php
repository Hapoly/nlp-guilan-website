<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationAuthor extends Model
{
  protected $table = 'publication_author';
  protected $primatyKey = 'id';
  protected $incrementing = true;
  protected $dates = ['deleted_at'];
}
