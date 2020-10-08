<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ mix('css/apptwo.css') }}" rel="stylesheet">
   {{-- <link href="{{ mix('css/appthree.css') }}" rel="stylesheet"> --}}

     {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        a{
            text-decoration: none !important;
        }
    </style>
</head>
<body>

    <div class="bg-gray-200 w-full text-white font-thin font-serif h-16">
    <div class="w-3/5 mx-auto justify-center items-center">
           <ul class="flex py-1">
                   @guest
                   @if(Route::has('register'))
                     <li><a href="{{ route('register') }}" class="no-underline text-xl text-black ">Register</a></li>
                   @endif
                 <li><a href="{{ route('login') }}" class="no-underline text-xl text-black pl-2">Login</a></li>

                   <li><a href="{{ route('blogs.index') }}" class="no-underline text-xl text-black pl-2">All Blog Posts</a></li>
                   @else

                     <li><a href="{{ route('blogs.create') }}" class="no-underline text-xl text-black">Add a blog post</a></li>
                     <li><a href="{{ route('blogs.index') }}" class="no-underline text-xl text-black pl-2">All Blog Posts</a></li>
                     <li>
                              <a class="p-4 text-xl text-black no-underline"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}-{{Auth::user()->name  }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                     </li>

                 @endguest

           </ul>
    </div>
</div>


         {{-- <a href="{{ route('blogs.index') }}">All Blog Posts</a>
           {{-- <a href="{{ route('posts.create') }}">Add a Blog Post</a> --}}
           {{-- <a href="{{ route('login') }}">Login</a>
        @else --}}
        {{-- <p>Welcome User</p>
         <a href="{{ route('posts.create') }}">Add a Blog Post</a>
         d a Blog Post</a>
           <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
        {{-- @endguest  --}}
    @if(session()->has('status'))
     <div class="bg-green-600 py-1 px-4">
         <p class="text-2xl text-white">{{ session()->get('status') }}</p>
     </div>
     @endif
@yield('content')

@yield('script')


</body>
</html>
