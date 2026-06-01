<x-layout>
    <div > <a href="{{route("drafts.create")}}"> Create one  </a>


    @forelse($ownedDrafts as $draft)
        <div style="padding: 10px">
        <div style="border: 2px solid cadetblue; padding: 10px ">
            <a style=" font-size: 18px; font-weight: bolder " href="{{route('drafts.show',[ $draft->id] )}}"> {{$draft->title}}</a>

            <form style="display:inline;" method="POST" action="{{route("drafts.destroy", [ $draft ])}}">
                @csrf
                @method('DELETE')
                <br> <button type="submit"> Delete  </button>
            </form>
            <a style="border: 1px solid black ; color: black; background: beige  ; text-decoration: none ; padding: 2px" method="GET" href="{{route("drafts.edit", [ $draft ])}}">
                    Edit this
            </a>

        </div>
        </div>
    @empty
        <h1> <u> <strong> Go work on something bro  </strong></u></h1>
    @endforelse
</x-layout>

