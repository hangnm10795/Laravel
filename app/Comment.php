<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['body','blog_id','user_id'];
	public function blog()
	{
		return $this->belongsTo(Blog::class);
	}

	public function user() // $comment->user->name
	{
		return $this->belongsTo(User::class);
	}
}
