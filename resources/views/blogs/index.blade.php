@extends('layouts')
@section('content')
 <a href="{{ route('blogs.create') }}" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800">Create New Post</a>
@forelse ($blogs as $blog)
<div class="flex flex-col justify-center items-center w-full">
<div class="w-3/5 rounded overflow-hidden shadow-lg mx-auto">
  {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2"><a href="{{ route('blogs.show',['blog'=>$blog->id]) }}">{{ $blog->title }}</a></div>
    <a a href="{{ route('blogs.edit',['blog'=>$blog->id])}}" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800">Edit</a>

    {{-- <a a href="{{ route('blogs.destroy',['blog'=>$blog->id])}}" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800">Edit</a> --}}
           <form
    action="{{route('blogs.destroy',['blog'=>$blog->id])}}"
    method="post">
        @csrf
        @method('DELETE')
        <button class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800" type="submit">DELETE</button>
    </form>

    {{-- <p class="text-gray-700 text-base">
     {{ $blog->body }}
    </p> --}}
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>
</div>
@empty
<p class="text-orange-800">No blogs available</p>
</div>

@endforelse

@endsection
