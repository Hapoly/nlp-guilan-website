<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
  public $table = 'datasets';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];

  public function publication(){
    return $this->belongsTo('App\Publication');
  }

  public function requests(){
    return $this->hasMany('App\DatasetRequest');
  }

  public $status_language = [
    1 => 'published',
    2 => 'unpublished'
  ];

  public function get_status(){
    return $this->status_language[$this->status];
  }

  public $type_language = [
    1 => 'downloadable',
    2 => 'have to request'
  ];

  public function get_type(){
    return $this->type_language[$this->type];
  }
}
