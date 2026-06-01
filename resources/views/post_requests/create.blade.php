<x-layout>
    <style>
        select {
            width: 150px;
        }
    </style>

    <form method='POST' action="{{route('post-requests.store')}}">
        @csrf
        <input name="draft_id" hidden value="{{request('draft_id')}}">
        <label> apply tags </label> <br>
        <select name="tags[]" multiple>
            @forelse(\App\Models\Tag::all() as $tag)
                <option value="{{$tag->id}}" > {{$tag->name}} </option>
            @empty
            @endforelse
        </select><br>
        <label>Post </label> <br>
        <select name="post_id" >
            <option value="" > Make New </option>
            @forelse(auth()->user()->posts as $post)
            <option value="{{$post->id}}" > {{$post->title}} </option>
            @empty
            @endforelse
        </select> <br>
        <button type="submit"> request to post   </button>
    </form>
</x-layout>
