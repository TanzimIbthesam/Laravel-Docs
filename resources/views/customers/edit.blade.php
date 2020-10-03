@extends('layouts')

@section('content')


<div class="flex items-center justify-center h-screen">
  <form action="{{ route('customers.update',['customer'=>$customer->id]) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post">
      @csrf
      @method('PUT')
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="username" type="text" placeholder="Username" value="{{ $customer->name }}">
    </div>

    <div class="flex flex-col ">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        SEND
      </button>
@if ($errors->any())

    </div>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>

  @endforeach
</div>
@endif
  </p>
</div>
@endsection
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">


