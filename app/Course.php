<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
	use Notifiable;
	
    protected $fillable = [
    	'title',
    	'description',
    	'image',
    ];

    public function lessons()
    {
      return $this->hasMany(Lesson::class);
    }
    public function status()
    {
        return $this->hasMany(Status::class);
    }
}
