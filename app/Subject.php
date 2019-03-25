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

    public function student(){
      return $this->belongsTo('App\Student');
    }




}
