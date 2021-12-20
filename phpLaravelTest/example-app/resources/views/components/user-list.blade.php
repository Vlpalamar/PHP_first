<div>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @foreach($comments as $comment)
            @if($comment->user_id==$user->id)
                <h4> Comment: {{$comment->comment_text}}</h4>
            @endif
        @endforeach
        <br>
    @endforeach
</div>
