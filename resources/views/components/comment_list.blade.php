 @forelse ($comments as $allcomment)
         <p>{{ $allcomment->content }}</p>
     @update(['date'=>$allcomment->created_at,'name'=>$allcomment->user->name,'userId'=>$allcomment->user->id])

         @endupdate

    @empty

 <p class="text-2xl text-red-400">No Comments available</p>
    @endforelse
 @include('comment.form')
