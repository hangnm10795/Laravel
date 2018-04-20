@extends('layouts.bloglayout')

@section('content')
<div class="col-sm-8 blog-main">
	@can('delete_post')
	<form action="{{action('BlogController@destroy', $blog->id)}}" method="post" class="float-right">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
		<div class="form-group">
			<button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash-alt"></i></button>
		</div>
	</form>
	@endcan
	
	@can('edit_post')
		<a href="{{action('BlogController@edit',$blog->id)}}" class="btn btn-info btn-sm float-right"><i class="far fa-edit"></i></a>
	@endcan
	<h1>{{ $blog->title }}</h1>
	{{ $blog->body }}

	<hr>

	<div class="comments">
		<ul class="list-group">
			@foreach ($blog->comments as $comment)
			<li class="list-group-item">
				<strong>
					{{ $comment->created_at->diffForHumans() }} by {{ $blog->user->name }} : &nbsp;
				</strong>
				{{ $comment->body }}
			</li>
			@endforeach
		</ul>
		
	</div>

	<!-- Add a comment -->
	<div class="card">
		<div class="card-block">
			<form method="POST" action="/blog/{{ $blog->id }}/comments">
				{{ csrf_field() }}
				@if (Auth::check())
				<div class="form-group">
					<textarea  name="body" placeholder="Your comment here." class="form-control" required></textarea>
				</div>
				@endif
				<div class="form-group">
					@if (Auth::check())
					<button type="submit" class="btn btn-primary">Add Comment</button>
					@endif
				</div>
			</form>

			@include ('layouts.errors')
		</div>
	</div>
</div>
@endsection