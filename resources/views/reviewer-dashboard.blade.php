<x-layout>
    <style>
        td{
            border: darkgray solid thin ;
        }
    </style>
<table>
        <tr><th>id</th><th>title</th> <th>tags</th> <th>user</th>  <th> created at </th> <th> status  </th> </tr>
    @forelse($requests as $request)
        <tr>
            <td> {{$request->id}} </td>
            <td> {{$request->title}} </td>
            <td> <x-tags :tags="$request->tags"></x-tags> </td>
            <td> {{$request->draft->user->name}} </td>
            <td> {{$request->created_at}} </td>
            @if($request->status === \App\PostRequestStatus::Pending )
                <td style="background: orange "> Pending </td>
            @else
                @if($request->status === \App\PostRequestStatus::Declined)
                    <td style= "background: red "> Declined </td>
                @else
                    <td style="background: palegreen "> Accepted </td>
                @endif
            @endif

            <td> <a href="{{route('post-requests.show', [$request])}}"> show </a></td>

        </tr>
    @empty
    @endforelse
</table>
</x-layout>
