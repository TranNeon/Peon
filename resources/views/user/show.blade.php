<x-layout>
    <div> Name :{{$user->name}} </div>
    <div> Contact email : {{ $user->email }}</div>
    <div> User Role: {{$user->role}}</div>
    @auth
        @if(auth()->user()->role === \App\UserRole::ADMIN )
            <label> Change role : </label>
            <form method="POST" action="{{route('users.update', $user)}}" >
                @method('PATCH')
                @csrf
                <select name="role"  >
                    <option value="{{\App\UserRole::ADMIN}}"> Administrator </option>
                    <option value="{{\App\UserRole::REVIEWER}}"> Reviewer </option>
                    <option value="{{\App\UserRole::USER}}"> User </option>
                </select>
                <button> Set </button>
            </form>
        @endif
    @endauth
</x-layout>
