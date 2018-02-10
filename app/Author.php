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
  const INACTIVE = 2;
  
  public function publications(){
      return $this->belongsToMany('App\Publication');
  }

  public $status_language = [
    1   => "active",
    2   => "inactive",
  ];

  public function get_status(){
    return $this->status_language[$this->status];
  }

  public $shown_language = [
    1   => "shown",
    2   => "hidden",
  ];

  public function is_shown(){
    return $this->shown_language[$this->shown];
  }

  public $graduation_status_language = [
    1   => "graduated",
    2   => "not graduated",
  ];

  public function get_graduation_status(){
    return $this->graduation_status_language[$this->graduation_status];
  }

  public $position_language = [
    1   => "Bachelor",
    2   => "Master",
    3   => "Doctorate",
    4   => "Instructor",
    5   => "Assistant professor",
    6   => "Associate professor",
    7   => "Professor",
    8   => "distinguished Professor",
  ];

  public function get_position(){
    return $this->position_language[$this->position];
  }
}
