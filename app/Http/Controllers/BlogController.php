<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Repositories\Blogs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {   
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

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        session()->flash(
            'message', 'Post has been deleted!!'
        );

        return redirect('/');
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)
                    ->first();

        return view('blog.edit', compact('blog', 'id'));
    }

    public function update(Request $request, $id)
    {
        $blog = new Blog();
        $data = $this->validate($request, [
            'title'=>'required',
            'body'=> 'required'
        ]);
        $data['id'] = $id;
        $blog->updateBlog($data);

        session()->flash(
            'message', 'Post has been updated!!'
        );

        return redirect('/');
    }
}
