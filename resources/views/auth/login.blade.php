<x-layout>
    <form method='GET' action="{{route('login-fn')}}">
        @csrf
        <fieldset class="$$fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="$$fieldset-legend">Log in </legend>

            <label class="$$label">Email</label>
            <input name="email" type="email" class="$$input" placeholder="Email" />
            <label class="$$label">Password</label>
            <input name="password" type="password" class="$$input" placeholder="Password" />
            <button class="$$btn $$btn-neutral mt-4" type="submit">Log in </button>
        </fieldset>


        @error('email')
        <div style="background: red"> ERROR : DO SOMETHING </div>
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('password')
        <div style="background: red"> ERROR : DO SOMETHING </div>
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


    </form>
</x-layout>
