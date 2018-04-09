<!DOCTYPE html>
<html lang="en">

  @include('layouts.bloghead')

  <body>

    @include('layouts.blognav')

    @if ($flash = session('message'))
      <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }} 
      </div>
    @endif

    <div class="container">
      <div class="row">
        @yield('content')
        
        <!-- @include('layouts.blogsidebar') -->
      </div>
    </div>

    @include('layouts.blogfooter')

  </body>
</html>
