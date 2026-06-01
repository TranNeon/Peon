{{--//how to give type of blog here --}}
<div style="border: black">
{{--    @dd($blog)--}}
    <h2> {{$blog->title}}</h2>
    <h6> {{$blog->created_at}}</h6>
    <p>
        {{$blog->content}}
    </p>
</div>
