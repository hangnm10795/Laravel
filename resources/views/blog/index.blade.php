@extends ('layouts.bloglayout')

@section('content')
	<div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

          @foreach ($blog as $blog)
            @include ('blog.blog')
          @endforeach

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>
        </div><!-- /.blog-main -->

          @include('layouts.blogsidebar')
          
      </div><!-- /.row -->

    </div><!-- /.container -->
@endsection