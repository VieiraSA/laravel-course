<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}?v=1">
  <title>Document</title>
</head>
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Laravel Blog</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="{{ route('home') }}">Home</a>
      <a class="p-2 text-dark" href="{{ route('contact') }}">Contact</a>
      <a class="p-2 text-dark" href="{{ route('posts.index') }}">Blog Posts</a>
      <a class="p-2 text-dark" href="{{ route('posts.create') }}">Add Blog Post</a>
      @guest
      <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
      <a class="p-2 text-dark" href="{{ route('posts.create') }}">Login</a>
          Guest!
        @else
          Hello User!
      @endguest
    </nav>
  </div>
  <div class="container">
    @if (session()->has('status'))
    <p style="color: green">
      {{ session()->get('status') }}
    </p>
    @endif
    @yield('content')
  </div>
  <script src="{{ mix('js/app.js')}}"></script>
</body>
</html>
