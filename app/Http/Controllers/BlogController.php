<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Repositories\Blogs;
use Carbon\Carbon;

class BlogController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {   
        // $blog = $blogs->all(); public function index(Blogs $blogs)
        $blog = Blog::latest()
            ->filter(request(['month', 'year']))
            ->get();

    	return view('blog.index', compact('blog')); 
    }

    public function show(Blog $blog)
    {
    	return view('blog.show', compact('blog')); 
    }

    public function create()
    {
    	return view('blog.create'); 
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Blog(request(['title', 'body']))
        );

        session()->flash(
            'message', 'Your post has now been published.'
        );

        return redirect('/');
        // return redirect(route('index'));
    }
}
