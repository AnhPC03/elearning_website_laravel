<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'id_user',
    	'id_course',
    	'lessons'
    ];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function course()
    {
    	return $this->belongsTo(Course::class, 'id_course');
    }
}
