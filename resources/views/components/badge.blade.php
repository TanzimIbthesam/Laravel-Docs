

 @if(!isset($show) || $show)
    <button class="mr-2  text-md bg-green-400 text-white text-center py-2 rounded  leading-none px-2">
        {{ $slot }}
    </button>
@endif

