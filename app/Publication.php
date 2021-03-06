<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public $table = 'publications';
    public $primatyKey = 'id';
    public $incrementing = true;
    public $dates = ['deleted_at'];

    public function authors(){
      return $this->belongsToMany('App\Author');
    }

    public function datasets(){
      return $this->hasMany('App\Dataset');
    }

    const PUBLISHED = 1;
    const UNPUBLISHED = 2;
    public $status_language = [
      1   => "published",
      2   => "unpublished",
    ];
  
    public function get_status(){
      return $this->status_language[$this->status];
    }

    public $type_language = [
      1   => "journal",
      2   => "conference",
    ];
  
    public function get_type(){
      return $this->type_language[$this->type];
    }
}
