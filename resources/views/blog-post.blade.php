@extends('layouts')

@section('content')
    {!! $welcome !!}{{ $data['title'] }}
     <a href="{{ route('tests') }}" target="_blank">Tests</a>
@endsection('content')
