<?php

namespace App;
use App\Subject;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    //
    protected $fillable = [
      'kolokvijum',
      'seminarski',
      'aktivnost',
      'ocena',
      'user_id',
      'subject_id'
    ];

    public function student(){
      return $this->belongsTo('App\Student');
    }

    public function subject(){
      return $this->hasOne('App\Subject', 'id', 'subject_id');
    }

    public function exam(){
      return $this->hasOne('App\Exam');
    }
}
