<div>
    @foreach($tags as $tag )
        <a style="color:navy ; font-weight: normal" href="{{route('posts.show_by_tag', [$tag->name])}}">  #{{$tag->name}}  </a>
    @endforeach
</div>
