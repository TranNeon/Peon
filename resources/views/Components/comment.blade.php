@if($comment->user_id)
    <div> {{$comment->user->name}} - {{$comment->user->email}} @ {{$comment->created_at }}  </div>
    <div> {{$comment->content}}</div>
@else
    <div> {{$comment->name ?? "anonymous"}} - {{$comment->email ?? ''}} @ {{$comment->created_at }}  </div>
    <div> {{$comment->content}}</div>
@endif
