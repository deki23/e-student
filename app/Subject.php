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
      'user_id'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function student(){
      return $this->belongsTo('App\Student');
    }




}
