<x-layout>
    <div > <a href="{{route("drafts.create")}}"> Create one  </a>


    @forelse($ownedDrafts as $draft)
        <div>
            <a href="{{route('drafts.show',[ $draft->id] )}}"> {{$draft->title}}</a>

            <form method="POST" action="{{route("drafts.destroy", [ $draft ])}}">
                @csrf
                @method('DELETE')
                <button type="submit"> Delete  </button>
            </form>
            <form method="GET" action="{{route("drafts.edit", [ $draft ])}}">
                @csrf
                <button type="submit"> Edit  </button>
            </form>

        </div>
    @empty
        <h1> <u> <strong> Go work on something bro  </strong></u></h1>
    @endforelse
</x-layout>

