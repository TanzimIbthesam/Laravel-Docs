@extends('layouts')
@section('content')
@forelse ($customers as $customer)

{{-- <p class="text-2xl font-bold text-blue-600"><a href="{{ ro }}">{{  $newcustomer->name}}</a></p> --}}
<p class="text-2xl font-bold text-blue-600"><a href="{{route('customers.show',['customer'=>$customer->id]) }}">{{ $customer->name }}</a></p>
<p class="text-2xl font-bold text-blue-600"><a href="{{route('customers.edit',['customer'=>$customer->id]) }}">Edit</a></p>
<p class="text-2xl font-bold text-blue-600">

    <form
     method="POST"
    action="{{ route('customers.destroy',['customer'=>$customer->id]) }}">


        @csrf
          @method( 'DELETE' )
           <button type="submit" class="px-4 py-1 bg-transparent border border-gray-900 text-orange-600">DELETE</button>
        <form>
</p>


@empty

<p>No Customers</p>


@endforelse


@endsection('content')
