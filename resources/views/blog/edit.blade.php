@extends('layouts.bloglayout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">
			<h1>Edit the post</h1>
			<hr>
			<form method="POST" action="{{action('BlogController@update', $id)}}">
				{{ csrf_field() }}

				<div class="form-group">
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea id="body" name="body" class="form-control">{{$blog->body}}</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
				
				@include('layouts.errors')

			</form>

		</div>
		@include('layouts.blogsidebar')
	</div>
</div>


@endsection