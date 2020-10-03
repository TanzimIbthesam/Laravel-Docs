@extends('layouts')

@section('content')
 <form action="{{ route('blogs.store')}}" method="POST">
    @csrf
<div class="w-full flex flex-col justify-center items-center h-screen">

    <label class="text-gray-600 font-light">Enter Title</label><br>
<input type='text' placeholder="Enter your title here" name="title" class="w-1/5 mt-2 mb-6 px-8 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" /><br>
 <textarea name="body" class="w-1/5  py-10 text-gray-700 border rounded-lg focus:outline-none -mt-8" rows="4"></textarea>
@if($errors->any())

@foreach ($errors->all() as $error)
<div  class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
    <span class="text-xl inline-block mr-5 align-middle">
      <i class="fas fa-bell"></i>
    </span>
    <span class="inline-block align-middle mr-8">
      <b class="capitalize">Oops!</b>{{ $error }}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
      <span>×</span>
    </button>
  </div>
@endforeach


@endif
 <button type="submit" class="px-6 py-1 rounded-full bg-blue-600 text-white text-center mt-2 w-1/5">SEND</button>


</div>
 </form>
@endsection
