<?php 

namespace App\Repositories;

use App\Blog;
use App\Redis;

class Blogs
{
	protected $redis;

	public function __construct(Redis $redis)
	{
		$this->redis = $redis;
	}

	public function all()
	{
		return Blog::all();
	}

}