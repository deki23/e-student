<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    $protected= [
      'naziv_predmeta',
      'ocena',
      'semestar',
      'user_id'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }




}
