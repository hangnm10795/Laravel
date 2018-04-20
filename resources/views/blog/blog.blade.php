<div class="blog-post">
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
	<h2 class="blog-post-title">
		<a href="/blog/{{ $blog->id }}">
			{{ $blog->title }}
		</a>
	</h2>

	<p class="blog-post-meta">
		{{ $blog->user->name }} on
		{{ $blog->created_at->toFormattedDateString() }}
	</p>

	{{ $blog->body }}
</div>