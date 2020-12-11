@extends('layouts')
@section('content')
    <div class="flex justify-center items-center">
<h1 class="text-2xl text-blue-900">Contact Page</h1>
@can('contact.secret')

 <a href="{{ route('secret') }}">This is a secret link</a>
@endcan
</div>

@endsection
