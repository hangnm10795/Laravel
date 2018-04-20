<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = ['title', 'body'];
	
	public function comments()
	{
		return $this->hasMany(Comment::class); //Comment::class equivalent to App\Comment
	}

	public function user()  // $post->user //$comment->post->user
	{
		return $this->belongsTo(User::class);
	}

	public function addComment($body)
	{
		$this->comments()->create(compact('body'));
	}

	public function updateBlog($data)
	{
		$blog = $this->find($data['id']);
		$blog->user_id = auth()->user()->id;
		$blog->title = $data['title'];
		$blog->title = $data['title'];
		$blog->save();
		return 1;
	}

    public function scopeFilter($query, $filters)
    {
		if (isset($filters['month']) && $month = $filters['month']) {
		    $query->whereMonth('created_at', Carbon::parse($month)->month);
		}

		if (isset($filters['year']) && $year = $filters['year']) {
		    $query->whereYear('created_at', $year);
		}
    }

    public static function archives()
    {
    	return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }


}
