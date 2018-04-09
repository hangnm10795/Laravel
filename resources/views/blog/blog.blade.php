<div class="blog-post">
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