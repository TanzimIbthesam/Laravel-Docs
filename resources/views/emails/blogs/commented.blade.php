<style>
    body{
        font-family: Arial, Helvetica, sans-serif;

    }
</style>
<body>

    <p>
         <a href="{{ route('blogs.show',['blog'=>$comment->commentable->id]) }}">
              Someone commented on your blog post
        {{ $comment->commentable->user->name }}
        </a>


    </p>
    <p>
           <a href="{{ route('users.show',['user'=>$comment->user->id]) }}">
                    {{ $comment->user->name }}
        </a>
        said:
    </p>
    <p>
        {{ $comment->content }}
    </p>
</body>
