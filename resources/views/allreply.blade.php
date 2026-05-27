<h3>Comments </h3>
@forelse($replies as $reply)
        <div> {{ $reply->user_id ?? 'anonymous' }}-{{ $reply->id }}@ {{ $reply->created_at }} <<< {{ $reply->parent }}  </div>
        <div class="reply">
            <blockquote> {{ $reply->content }}</blockquote>
        </div>
    @empty
        <div> make a posts </div>
    @endforelse

{{--    TODO , implement reply route --}}
    <form action="{{route('reply', [$post])}}">
        @csrf
        <fieldset>
            <legend> Send a reply</legend>

        <label > reply to </label> <br>
        <input name='parent' type="number" /> <br>
        <label > content </label> <br>

        <textarea name="content">
        </textarea>
        <br>
        <button type="submit" > Reply </button>
        </fieldset>
    </form>
