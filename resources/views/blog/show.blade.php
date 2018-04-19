@extends('layouts.bloglayout')

@section('content')
<div class="col-sm-8 blog-main">
	<h1>{{ $blog->title }}</h1>
	{{ $blog->body }}

	<hr>

	<div class="comments">
		<ul class="list-group">
			@foreach ($blog->comments as $comment)
			<li class="list-group-item">
				<strong>
					{{ $comment->created_at->diffForHumans() }} : &nbsp;
				</strong>
				{{ $comment->body }}
				<a href="#" class="float-right"><i class="fas fa-times"></i></a>
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

						@can('edit_post')
						<button type="submit" class="btn btn-info">Edit Post</button>
						@endcan
						
						@can('delete_post')
						<button type="submit" class="btn btn-danger">Delete Post</button>
						@endcan
					@endif
				</div>
			</form>

			@include ('layouts.errors')
		</div>
	</div>
</div>
@endsection