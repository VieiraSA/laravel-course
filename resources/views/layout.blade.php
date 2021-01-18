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
      <a class="p-2 text-dark" href="{{ route('home') }}">{{ __('Home') }}</a>
      <a class="p-2 text-dark" href="{{ route('contact') }}">{{ __('Contact') }}</a>
      <a class="p-2 text-dark" href="{{ route('posts.index') }}">{{ __('Blog Posts') }}</a>
      <a class="p-2 text-dark" href="{{ route('posts.create') }}">{{ __('Add Blog Post') }}</a>
      @guest
      @if (Route::has('register'))
      <a class="p-2 text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
      @endif
      <a class="p-2 text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
      {{ __('Guest') }}!
      @else
      <a class="p-2 text-dark" href="{{ route('users.show',['user' => Auth::user()->id ]) }}">
        {{ __('Profile') }}
      </a>
      <a class="p-2 text-dark" href="{{ route('users.edit',['user' => Auth::user()->id ]) }}">
        {{ __('Edit Profile') }}
      </a>
      <a class="p-2 text-dark" href="{{ route('logout') }}"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        {{ __('Logout') }} ( {{ Auth::user()->name }} )
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
        @csrf
      </form>
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