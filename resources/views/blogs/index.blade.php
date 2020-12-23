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

  <div class="px-6 py-4 rounded overflow-hidden shadow-lg mt-2">

    <div class="font-bold text-xl mb-2">
      @if ($blog->trashed())
          <del>
      @endif

        <a class="{{ $blog->trashed() ? 'text-red-800' : ' ' }}" href="{{ route('blogs.show',['blog'=>$blog->id]) }}">{{ $blog->title }}</a></div>

     @can('update', $blog)
               <a a href="{{ route('blogs.edit',['blog'=>$blog->id])}}" class="{{ $blog->trashed() ? 'hidden' : 'px-4 py-1 bg-transparent border border-gray-900 text-orange-800'}}">Edit</a>
            @endcan



    <form
    action="{{route('blogs.destroy',['blog'=>$blog->id])}}"
    method="post">
        @csrf
        @method('DELETE')

            @can('delete', $blog)

      @if ($blog->trashed())
        <button class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800 hidden" type="submit">DELETE</button>
        @else
         <button class="px-4 py-1 bg-transparent border border-gray-900 text-orange-800 " type="submit">DELETE</button>
      @endif

           @endcan

    </form>
    @update(['date'=>$blog->created_at,'name'=>$blog->user->name])

    @endupdate


    @if($blog->comment_count)
<p class="text-md font-semibold font-sans text-gray-700">{{ $blog->comment_count}} Comments</p>
</p>


    @else
      <p class="text-md font-semibold font-sans text-gray-700">No Comments</p>
      @endif

    @tags (['tags'=>$blog->tag])

@endtags


  </div>

   @empty
<p class="text-orange-800">No blogs available</p>
  @endforelse
</div>
<div class="w-1/4 ">

@include('blogs._activity')






 </div>
</div>
</div>



</div>





@endsection
