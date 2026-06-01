<x-layout>
<a href="{{route('post-requests.create', ['draft_id' => $draft->id] )}}"> Make this post public</a>

<x-blog :blog="$draft">

</x-blog>
</x-layout>

