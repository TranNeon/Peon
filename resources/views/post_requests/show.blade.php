<x-layout>


@can('review', \App\Models\PostRequest::class)

    <form id="approve" method="POST" action="{{route('reviewer-dashboard.approve', $postRequest)}}" >
        <button type="submit"  form="approve"> approve </button>
        @csrf
        @method('PATCH')
    </form>

    <form  id="deny" method="POST" action="{{route('reviewer-dashboard.deny', $postRequest)}}">
        <button  type="submit" form="deny"> deny </button>
        @csrf
        @method('PATCH')
    </form>



@endcan



<x-blog :blog="$postRequest"> </x-blog>

</x-layout>
