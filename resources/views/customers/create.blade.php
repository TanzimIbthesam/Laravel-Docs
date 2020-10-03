@extends('layouts')

@section('content')


<div class="flex items-center justify-center h-screen">
  <form action="{{ route('customers.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post">
      @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="username" type="text" placeholder="Username" value="{{ old('name') }}">
    </div>

    <div class="flex flex-col ">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        SEND
      </button>
@if ($errors->any())

    </div>
    <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-3 rounded-md relative mt-1" role="alert">
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


