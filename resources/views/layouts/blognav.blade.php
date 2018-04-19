    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">Press</a>
          <a class="nav-link" href="#">New hires</a>

          
          @if (Auth::check())
            <a class="nav-link" href="{{ url('blog/create') }}">Add new post</a>
           <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
           <a class="nav-link" href="{{ url('logout') }}">Logout</a>
          @else
            <a class="nav-link ml-auto" href="{{ url('login') }}">Login</a>
            <a class="nav-link" href="{{ url('register') }}">Register</a>
          @endif

        </nav>
      </div>
    </div>

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">The Lastest New</h1>
        <p class="lead blog-description">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
      </div>
    </div>