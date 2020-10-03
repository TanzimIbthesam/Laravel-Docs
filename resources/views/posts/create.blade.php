@extends('layouts')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class=" border border-gray-400 w-1/6 py-20">
     <form action="{{ route('posts.store') }}" method="post" class="ml-8">
        @csrf
<input type="text" name="title" id="" class="border px-6 py-1"><br>
<input type="text" name="body" id="" class="border px-6 py-1 mt-4"><br>

<button type="submit" class="bg-green-500 text-white px-4 py-1 mt-4">SEND</button>
</form>
    </div>

</div>







@endsection
