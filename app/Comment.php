<?php

namespace App;


class Comment extends Model
{
	public function blog()
	{
		return $this->belongsTo(Blog::class);
	}

	public function user() // $comment->user->name
	{
		return $this->belongsTo(User::class);
	}
}
