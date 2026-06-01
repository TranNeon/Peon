<x-layout>
    <nav>
    @foreach( \App\Models\Tag::all() as $tag)
            <a style="color:navy ; font-weight: normal" href="{{route('posts.show_by_tag', [$tag->name])}}"> {{$tag->name}} </a>
    @endforeach
    </nav>
    @forelse($publicPost as $post)
        <div style="padding: 10px">
            <div style="border: 2px solid cadetblue; padding: 10px ">
                <a style=" font-size: 18px; font-weight: bolder "
                   href="{{route('posts.show_by_slug',[ 'slug' => $post->slug] )}}"> {{$post->title}}</a>
                <p>
                    {{$post->content}}
                </p>
            </div>
        </div>
    @empty
        <h1><u> <strong> Nothing to see yet user </strong></u></h1>
    @endforelse
</x-layout>

