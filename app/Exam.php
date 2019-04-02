<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $fillable = [
      'subject_id',
      'score'
    ];

    public function subject(){
      return $this->belongsTo('App\StudentSubject');
    }

}
