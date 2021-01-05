@extends('layouts')
@section('content')
<div class="container flex mx-auto">
    <div class="h-32 bg-gray-100 py-1 w-32 rounded-lg">
         <img src={{"https://pickaface.net/gallery/avatar/unr_random_180410_1905_z1exb.png"}} alt="lovely avatar" class="object-cover object-center w-full h-full visible group-hover:hidden">
        {{-- <img src={{"https://www.nj.com/resizer/zovGSasCaR41h_yUGYHXbVTQW2A=/1280x0/smart/cloudfront-us-east-1.images.arcpublishing.com/advancelocal/SJGKVE5UNVESVCW7BBOHKQCZVE.jpg"}} class="w-32 h-32 ml-16" alt=""> --}}
        <p class="text-center  font-bold">Upload a different photo</p>
          <a a href="{{ route('users.edit',['user'=>$user->id])}}" class="bg-blue-500 px-8 py-2 text-white font-serif rounded-md">Edit</a>
       @commentForm(['route'=>route('users.comment.store',['user'=>$user->id])])

   @endcommentForm
                   @commentList(['comments'=>$user->commentOn])

    @endcommentList
    </div>


</div>
@endsection
{{-- <div class="container mx-auto flex">Hello</div> --}}
