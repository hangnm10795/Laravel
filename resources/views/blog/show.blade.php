@extends('layouts.bloglayout')

@section('content')
<!-- <div class="container"> -->
	<!-- <div class="row"> -->
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
					</li>
					@endforeach
				</ul>
				
			</div>

			<!-- Add a comment -->
			<div class="card">
				<div class="card-block">
					<form method="POST" action="/blog/{{ $blog->id }}/comments">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea  name="body" placeholder="Your comment here." class="form-control" required></textarea>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Add Comment</button>
						</div>
					</form>

					@include ('layouts.errors')
				</div>
			</div>
		</div>
		
		<!-- @include('layouts.blogsidebar') -->
		<!-- </div> -->

		<!-- </div> -->

		@endsection