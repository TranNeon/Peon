<x-layout>
<form method="POST" action="{{route("drafts.store")}}">
    @csrf
    <label > title </label> <br>
    <input name="title"> <br>
    <textarea name="content"> </textarea> <br>
    <button type="submit"> New Draft </button>
</form>

</x-layout>
