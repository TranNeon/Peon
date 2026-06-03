<x-layout>
    <div> Name :{{$user->name}} </div>
    <div> Contact email : {{ $user->email }}</div>
    <div> User Owned Roles: {{$user->getRoleNames()}}</div>
    @auth
        @if(auth()->user()->hasRole ( \App\UserRole::ADMIN) || auth()->user()->is($user) )
            <form method="POST" action="{{route('users.update', $user)}}" >
                @method('PATCH')
                @csrf
                <label >Name</label>

                <input name="name" type="text" value="{{ old('name', $user->name)  }}" />
                <label >Email</label>
                <input name="email" type="email"  value="{{old('email', $user->email)}}" />
                <label >Password</label>
                <input name="password" type="password"  value="" />
                @if(auth()->user()->hasRole(\App\UserRole::ADMIN) )
                    <label> Change role : </label>
                <select name="roles[]" multiple >
                    @foreach(\App\UserRole::cases() as $case)
                        @if($user->hasRole($case))
                            <option  selected value="{{$case}}"> {{$case}}</option>
                        @else
                            <option  value="{{$case}}"> {{$case}}</option>
                        @endif
                    @endforeach
                </select>
                @endif()
                <button type="submit"> Update Information </button>
            </form>
        @endif
    @endauth
</x-layout>
