@extends('layouts.bloglayout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">
			<h1>Publish a Post</h1>
			<hr>
			<form method="POST" action="/blog">

				{{ csrf_field() }}

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea id="body" name="body" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Publish</button>
				</div>
				<a href="/"><i class="fas fa-angle-double-left"></i></a>
				@include('layouts.errors')

			</form>

		</div>
		@include('layouts.blogsidebar')
	</div>
</div>


@endsection