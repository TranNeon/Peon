

@guest
    <div> login to inspect your info </div>
@endguest
@auth
    <div>Logged in user:  {{auth()->user()}}</div>
@php
    $user = auth()->user();
    echo $permissionNames = $user->getPermissionNames(); // collection of name strings
    echo $permissions = $user->permissions; // collection of permission objects

    // get all permissions for the user, either directly, or from roles, or from both
    echo $permissions = $user->getDirectPermissions();
    echo $permissions = $user->getPermissionsViaRoles();
    echo $permissions = $user->getAllPermissions();

    // get the names of the user's roles
    echo $roles = $user->getRoleNames();

@endphp
@endauth

<div> Begin testing blade directive </div>
@role('admin')
<div> you has admin access </div>
@else
    <div> you  DO NOT has admin access </div>

@endrole

@role('reviewer')
<div> you has reviewer access </div>
    @else
        <div> you  DO NOT has reviewer access </div>

    @endrole

@role('user')
<div> you has admin access </div>
        @else
            <div> you  DO NOT has user access </div>

@endrole
