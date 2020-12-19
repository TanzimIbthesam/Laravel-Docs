  <div class=" rounded-md overflow-hidden shadow-lg ml-2 bg-white py-8">
        <h1 class="text-xl font-semibold font-serif text-center">Most Commented posts blog</h1>
        @foreach ($mostCommented as $blog)
        <a  class=" font-serif  text-black px-1" href="{{ route('blogs.show',['blog'=>$blog->id]) }}">{{ $blog->title }}</a>

       {{-- <h1>{{ $blog->title }}</h1> --}}
       @endforeach
    </div>
    <div class=" rounded-md overflow-hidden shadow-lg ml-2 bg-white py-2 mt-3">
        <h1 class="text-xl font-semibold font-serif text-center italic">Most Active User</h1>
         @foreach ($mostActive as $user)
       <h1 class="text-sm font-serif text-center p-1">{{ $user->name }}</h1>
       @endforeach

    </div>
    <div class=" rounded-md overflow-hidden shadow-lg ml-2 bg-white h-48 mt-3 py-3">
        <h1 class="text-xl font-semibold italic font-serif text-center">Most Active User Last Month</h1>
         @foreach ($mostActiveLastMonth as $user)
       <h1 class="text-sm font-serif text-center p-1">{{ $user->name }}</h1>
       {{-- Number of posts by a user --}}
       <h1 class="text-sm font-serif text-center p-1">Number of posts-{{ $user->blog->count()}}</h1>
       @endforeach


    </div>
