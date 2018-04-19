<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Blog $blog)
    {
    	$this->validate(request(), ['body' => 'required|min:2']);
    	$blog->addComment(request('body'));
    	
    	return back();
    }
}

