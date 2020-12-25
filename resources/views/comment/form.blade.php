@auth
    <form action="{{ route('blogs.comment.store',['blog'=>$blog->id]) }}" method="POST">

    @csrf
    <div class="flex flex-col">
        {{-- <input class=" border rounded-md py-3 px-32  h-16 mt-8" name="content"> --}}
        <textarea name="content" class="w-4/5   text-gray-700 border rounded-lg focus:outline-none " rows="4"></textarea>
      <button class="px-1 py-1 bg-blue-500 text-white font-serif mt-1 w-32 mt-2">Add Comment</button>

    </div>
 @if($errors->any())
<x-error>

</x-error>



@endif
</form>
@else
<a href="{{ route('login') }}" class="text-md font-serif">Sign-In</a> to post comments
@endauth

