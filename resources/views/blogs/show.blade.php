@extends('layouts')
@section('content')


<div class="container flex mx-auto">
<div class="w-3/5 rounded overflow-hidden shadow-lg ">
  {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
  <div class="px-6 py-4 ">
       <div class="flex">
       <div>
<h1 class="font-bold text-2xl mb-2">{{ $blog->title }}</h1>
<p>Users Currently active-{{ $counter }}</p>
   @update(['date'=>$blog->created_at,'name'=>$blog->user->name])

         @endupdate
@tags (['tags'=>$blog->tag])

@endtags









       </div>
       <div class="ml-1 ">

       @if ((new Carbon\Carbon())->diffInMinutes($blog->created_at)<20)
     <x-badge >
                          Brand New Post
             </x-badge>
       @endif



       </div>
       </div>


    <p class="text-gray-700 text-base">
     {{ $blog->body }}
    </p>
    <h1 class="text-2xl font-bold">Comments</h1>



    @forelse ($blog->comment as $allcomment)
         <p>{{ $allcomment->content }},Added {{ $allcomment->created_at->diffForHumans() }}</p>


    @empty
 <p class="text-2xl text-red-400">No Comments available</p>
    @endforelse
  </div>

</div>
<div class="w-1/4">

@include('blogs._activity')
</div>

</div>



@endsection
