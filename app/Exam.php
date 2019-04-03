<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $fillable = [
      'status',
      'score'
    ];

    public function subject(){
      return $this->belongsTo('App\StudentSubject', 'subjects_id', 'id');
    }

}
