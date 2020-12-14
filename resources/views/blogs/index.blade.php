@extends('layouts')
@section('content')

<div class="container mx-auto flex">
 @if(Auth::user())
 <a href="{{ route('blogs.create') }}" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800">Create New Post</a>
 @endif
</div>

<div class="container mx-auto flex">


<div class="w-2/3">
@forelse ($blogs as $blog)
  {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
  <div class="px-6 py-4 rounded overflow-hidden shadow-lg mt-2">

    <div class="font-bold text-xl mb-2">
      @if ($blog->trashed())
          <del>
      @endif
        <a class="{{ $blog->trashed() ? 'text-red-800' : ' ' }}" href="{{ route('blogs.show',['blog'=>$blog->id]) }}">{{ $blog->title }}</a></div>
      {{-- @if ($blog->trashed())
          <del>
      @endif --}}
    {{-- @if (Auth::user()) --}}
     @can('update', $blog)
               <a a href="{{ route('blogs.edit',['blog'=>$blog->id])}}" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800">Edit</a>
            @endcan

    {{-- @endif  --}}

    {{-- <a a href="{{ route('blogs.destroy',['blog'=>$blog->id])}}" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800">Edit</a> --}}

    <form
    action="{{route('blogs.destroy',['blog'=>$blog->id])}}"
    method="post">
        @csrf
        @method('DELETE')
         {{-- @if (Auth::user()) --}}
            @can('delete', $blog)

      @if ($blog->trashed())
        <button class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800 hidden" type="submit">DELETE</button>
        @else
         <button class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800 " type="submit">DELETE</button>
      @endif

           @endcan
        {{-- @endif --}}
    </form>
          <p class="text-black">Added-{{ $blog->created_at->diffforHumans() }}-by-{{ $blog->user->name}}</p>
    @if($blog->comment_count)
<p class="text-md font-semibold font-sans text-gray-700">{{ $blog->comment_count}} Comments</p>
</p>


    @else
      <p class="text-md font-semibold font-sans text-gray-700">No Comments</p>
      @endif


    {{-- <p class="text-gray-700 text-base">
     {{ $blog->body }}
    </p> --}}
    <div class="px-6 pt-1 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>
  </div>

   @empty
<p class="text-orange-800">No blogs available</p> --}}
  @endforelse
</div>
<div class="w-1/4 ">




    <div class=" rounded-md overflow-hidden shadow-lg ml-2 bg-white py-8">
        <h1 class="text-xl font-semibold font-serif text-center">Most Commented posts blog</h1>
        @foreach ($mostCommented as $blog)
        <a  class="text-sm font-serif text-center text-black pl-3" href="{{ route('blogs.show',['blog',$blog->id]) }}">{{ $blog->title }}</a>

       {{-- <h1>{{ $blog->title }}</h1> --}}
       @endforeach
    </div>
    <div class=" rounded-md overflow-hidden shadow-lg ml-2 bg-white py-2 mt-3">
        <h1 class="text-xl font-semibold font-serif text-center">Most Active User</h1>
         @foreach ($mostActive as $user)
       <h1 class="text-sm font-serif text-center p-1">{{ $user->name }}</h1>
       @endforeach

    </div>
    <div class=" rounded-md overflow-hidden shadow-lg ml-2 bg-white h-48 mt-3">
        <h1 class="text-xl font-semibold font-serif text-center">Most Active User Last Month</h1>
         @foreach ($mostActiveLastMonth as $user)
       <h1 class="text-sm font-serif text-center p-1">{{ $user->name }}</h1>
       {{-- Number of posts by a user --}}
       <h1 class="text-sm font-serif text-center p-1">Number of posts-{{ $user->blog->count()}}</h1>
       @endforeach


    </div>



 </div>
</div>
</div>

{{-- @empty
<p class="text-orange-800">No blogs available</p> --}}

</div>





@endsection
