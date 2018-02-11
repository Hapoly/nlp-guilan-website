<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  public $table = 'authors';
  public $primatyKey = 'id';
  public $incrementing = true;
  public $dates = ['deleted_at'];

  const ACTIVE = 1;
  const OLD = 3;
  
  public function publications(){
      return $this->belongsToMany('App\Publication');
  }

  public $status_language = [
    1   => "active",
    2   => "old member",
  ];

  public function get_status(){
    return $this->status_language[$this->status];
  }

  const SHOWN = 1;
  const HIDDEN = 2;
  public $shown_language = [
    1   => "shown",
    2   => "hidden",
  ];

  public function is_shown(){
    return $this->shown_language[$this->shown];
  }

  const GRADUATED = 1;
  const NOT_GRADATED = 2;
  const SUPERVISOR = 3;
  const NONE = 4;
  public $graduation_status_language = [
    1   => "Bachelor",
    2   => "Master",
    3   => "Doctorate",
    4   => "Instructor",
    5   => "Assistant professor",
    6   => "Associate professor",
    7   => "Professor",
    8   => "distinguished Professor",
    9   => '-',
  ];

  public function get_graduation_status(){
    return $this->graduation_status_language[$this->graduation_status];
  }

  public $position_language = [
    1   => 'member',
    2   => 'supervisor',
    3   => '-',
  ];

  public function get_position(){
    return $this->position_language[$this->position];
  }
}
