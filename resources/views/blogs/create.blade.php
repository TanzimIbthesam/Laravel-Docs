@extends('layouts')

@section('content')
 <form action="{{ route('blogs.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="w-full flex flex-col justify-center items-center h-screen">

    <label class="text-gray-600 font-light">Enter Title</label><br>
<input type='text' placeholder="Enter your title here" name="title" class="w-1/5 mt-2 mb-6 px-8 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" /><br>
 <textarea name="body" class="w-1/5   text-gray-700 border rounded-lg focus:outline-none -mt-8" rows="4"></textarea>
@if($errors->any())
<x-error>

</x-error>



@endif
 <button type="submit" class="px-6 py-1 rounded-full bg-blue-600 text-white text-center mt-2 w-1/5 text-md font-bold">SEND</button>
<input type='file' placeholder="Enter your title here" name="image" class="w-1/5 mt-2 mb-6 px-8 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-green-500" /><br>

</div>
 </form>
@endsection
