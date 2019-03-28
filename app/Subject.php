<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $fillable = [
      'name',
      'ocena',
      'semestar',
      'kolokvijum',
      'seminarski',
      'aktivnost',
      'user_id'
    ];

    public function student(){
      return $this->belongsTo('App\Student');
    }

    public function exam(){
      return $this->hasOne('App\Exam');
    }

}
