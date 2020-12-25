
       <p class="text-black font-bold">
           Added-{{ $date->diffForHumans() }}
           @if(isset($name))
           by-{{ $name }}

@endif

       </p>

