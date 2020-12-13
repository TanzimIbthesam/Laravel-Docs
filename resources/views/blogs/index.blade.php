@extends('layouts')
@section('content')

<div class="container mx-auto flex">
 @if(Auth::user())
 <a href="{{ route('blogs.create') }}" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800">Create New Post</a>
 @endif
</div>

<div class="container mx-auto flex">


<div class="w-2/3 rounded overflow-hidden shadow-lg flex flex-col">
@forelse ($blogs as $blog)
  {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
  <div class="px-6 py-4">

    <div class="font-bold text-xl mb-2"><a href="{{ route('blogs.show',['blog'=>$blog->id]) }}">{{ $blog->title }}</a></div>
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
        <button class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800" type="submit">DELETE</button>
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
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>
   @empty
<p class="text-orange-800">No blogs available</p> --}}
  @endforelse
</div>
<div class="w-1/4  rounded overflow-hidden shadow-lg ml-2 bg-white h-48">
    <h1 class="text-2xl font-semibold font-serif text-center">Most Commented</h1>

 <div>
     @foreach ($mostCommented as $blog)
     <h1 class="text-xl font-serif text-center">{{ $blog->title }}</h1>

     @endforeach
 </div>
</div>
</div>

{{-- @empty
<p class="text-orange-800">No blogs available</p> --}}

</div>





@endsection
