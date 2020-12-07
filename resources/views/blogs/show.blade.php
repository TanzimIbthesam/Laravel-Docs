@extends('layouts')
@section('content')


<div class="flex flex-col justify-center items-center w-full">
<div class="w-3/5 rounded overflow-hidden shadow-lg mx-auto">
  {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ $blog->title }}</div>
    <p class="text-gray-700 text-base">
     {{ $blog->body }}
    </p>
    <h1 class="text-2xl font-bold">Comments</h1>
    @forelse ($blog->comment as $allcomment)
         <p>{{ $allcomment->content }},added {{ $allcomment->created_at->diffForHumans() }}</p>
    @empty
 <p class="text-2xl text-red-400">No Comments available</p>
    @endforelse
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
  </div>
</div>


</div>



@endsection
