
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
     <div class="px-6 pt-1 pb-2">
    @foreach ($tags as $tag)


    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</span>





    @endforeach
    </div>





