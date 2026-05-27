<x-layout>
    <form method='POST' action="{{route('register-fn')}}">
        @csrf
<fieldset class="$$fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
    <legend class="$$fieldset-legend">Register</legend>

    <label class="$$label">Name</label>
    <input name="name" type="text" class="$$input" placeholder="account name" />
    <label class="$$label">Email</label>

    <input name="email" type="email" class="$$input" placeholder="Email" />

    <label class="$$label">Password</label>
    <input name="password" type="password" class="$$input" placeholder="Password" />
    <button class="$$btn $$btn-neutral mt-4" type="submit">Register</button>
</fieldset>
    </form>
</x-layout>
