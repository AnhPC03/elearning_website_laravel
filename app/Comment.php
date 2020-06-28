<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
		'id_user',
		'lesson_id',
        'id_parent',
		'content'
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'id_user');
    }

    public function lesson()
    {
      return $this->belongsTo(Lesson::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'id_parent');
    }
}
