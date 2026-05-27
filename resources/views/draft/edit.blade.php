<x-layout>
    <form method="POST" action="{{route("drafts.update", [$draft])}}">
        @csrf
        @method('PATCH')
        <label > title </label> <br>
        <input value="{{$draft->title}}" name="title"> <br>
        <textarea  name="content"> {{$draft->content}} </textarea> <br>
        <button type="submit"> Make Changes </button>
    </form>
</x-layout>
