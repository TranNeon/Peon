<x-layout>

<x-tags :tags="$post->tags" > </x-tags>
<x-blog :blog="$post">

</x-blog>
{{-- slap in my reply section pls i beg u   --}}
<div> COMMENTS </div>
<div name="comment section " style="border: black dashed ">

<x-comment-tree  :post="$post" :comments="\App\Models\Comment::where('parent_comments_id', null )->where('post_id', $post->id)->get()">
{{--    <x-comment-tree  :post="$post" :comments="\App\Models\Comment::where('parent_comments_id', null )->where('id', 1)->get()">--}}


</x-comment-tree>
        @auth
        <form method='POST' action="{{route('comments.store')}}">
            @csrf
            <fieldset>
                @if(request('reply_to'))
                    <legend> Reply to</legend>
                    <div>
                        <x-comment :comment="\App\Models\Comment::find(request('reply_to'))"> </x-comment>
                    </div>
                @else
                    <legend> Leave a comment </legend>
                @endif
                <input name="content" type="text">
                <input hidden name="post_id" value='{{$post->id}}'>
                <input hidden name="parent_comments_id" value='{{request('reply_to') ?? null }}'>
                <button type="submit"> Send </button>
            </fieldset>
        </form>
    @endauth
    @guest
        <form method='POST' action="{{route('comments.store')}}">
            @csrf
            <fieldset>
                <legend> Leave a comment </legend>
                <label> name </label>
                <input name="name" type="text">
                <label> email </label>
                <input name="email" type="email"> <br>
                <input name="content" type="text">
                <input hidden name="post_id" value='{{$post->id}}'>
                <button type="submit"> Send </button>
            </fieldset>
        </form>
    @endguest
</div>

</x-layout>
