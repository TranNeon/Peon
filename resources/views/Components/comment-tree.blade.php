{{-- \App\Models\Comment::where('post_i$d', $post->id)->get() --}}
<ul name="comment_node">

@forelse( $comments as $comment)
        <li>
        <x-comment :comment="$comment">

        </x-comment>
        {{ $slot }}
        <details >
            <a href="{{route('posts.show_by_slug', ['slug' => $post->slug, 'reply_to'=> $comment ])}}"> reply </a>

            <summary>replies</summary>
            <x-comment-tree :post="$post" :comments="\App\Models\Comment::where('parent_comments_id', $comment->id)->get()">
            </x-comment-tree>
        </details>
        </li>
@empty
@endforelse
</ul>
