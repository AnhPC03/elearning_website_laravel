<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use SoftDeletes;
	
	protected $fillable = [
      'id_lesson',
      'question',
      'choice1',
      'choice2',
      'choice3',
      'choice4',
      'answer'
    ];

    public function lesson()
    {
      return $this->belongsTo(Lesson::class, 'id_lesson');
    }
}
