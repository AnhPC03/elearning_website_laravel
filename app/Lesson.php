<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
	use SoftDeletes;
	
	protected $fillable = [
      'id_course',
      'title',
      'description',
      'time',
      'video'
    ];

    public function course()
    {
      return $this->belongsTo(Course::class);
    }

    public function exercises()
    {
      return $this->hasMany(Exercise::class);
    }  

    public function comments()
    {
        return $this->hasMany(Comment::class)->where('id_parent', '!=', null);
    }

    // public function reply()
    // {
    //     return $this->hasMany(Reply::class);
    // }  
}
