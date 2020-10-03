@extends('layouts')
@section('content')
@forelse ($posts as $post)
<p class="text-2xl font-bold text-blue-600"><a href="{{ route('posts.show',['post'=>$post->id]) }}">{{ $post->title }}</a></p>
@empty
<p>No Blog Bosts</p>


@endforelse


@endsection('content')
