
@extends('layouts')
@section('content')
<div class="container  mx-auto flex mt-6" >
<div class="w-1/3">
    <form action="" method="POST"
    enctype="multipart/form-data"

    action="{{ route('users.update', ['user' => $user->id]) }}">
    @csrf
    @method('PUT')


    <div class="h-32 bg-gray-100 py-1 w-32 rounded-full">
        {{-- <img src={{"https://pickaface.net/gallery/avatar/unr_random_180410_1905_z1exb.png"}} alt="lovely avatar" class="object-cover object-center w-full h-full visible group-hover:hidden"> --}}
        <img src={{$user->image ? $user->image->url(): ' '}} alt="lovely avatar" class="object-cover object-center w-full h-full visible group-hover:hidden">

        <p class="text-center  font-bold">Upload a different photo</p>
        <input name="avatar" type="file" name="" id="">
    </div>
</div>
<div class="w-2/3">
    <input type="text" class="py-1 px-16  border-2 border-gray-600 rounded-full"><br>
    <button class="px-8 py-1 bg-gradient-to-r from-green-400 to-blue-500 text-white mt-1 rounded-md font-serif ">SAVE</button>
     </form>
</div>

</div>


@endsection
