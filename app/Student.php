<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name','email','password', 'last_name', 'br_indeksa'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password','remember_token',
  ];

  public function subjects(){
    return $this->hasMany('App\Subject');
  }
}
