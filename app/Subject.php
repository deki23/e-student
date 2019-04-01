<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $fillable = [
      'name',
      'semestar'
    ];

    public function studentSubject(){
      return $this->belongsToMany('App\Student');
    }

    public function studentSubjects(){
      return $this->belongsTo('App\StudentSubject');
    }


}
