@foreach ($errors->all() as $error)
<div  class="text-white px-6 py-1 border-0 rounded relative mb-4 bg-red-600">
    <span class="text-xl inline-block mr-5 align-middle">
      <i class="fas fa-bell"></i>
    </span>
    <span class="inline-block align-middle mr-8 text-center">
      <b class="capitalize">Oops!</b>{{ $error }}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
      <span>×</span>
    </button>
  </div>
@endforeach
