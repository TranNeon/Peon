<! DOCTYPE html>
<html>

<head>
<style>

    nav a {
        padding: 5px;
        font-size: 22px;
        color: brown;
        font-weight: bolder;
    }
</style>
</head>
<body>
<nav style="display:flex;  " >
    <a href="{{route('drafts.index')}}"> Drafts  </a>
<a href="{{route('post-requests.index')}}"> My Post Requests  </a>
    @auth
        <a href="{{route('logoutFn')}}" onclick="return confirm('123')"> logout </a>
    @endauth
    @guest
        <a href="{{route('register')}}"> sign up </a>
        <a href="{{route('login')}}"> log in  </a>
    @endguest
        @can('review post_request')
            <a href="{{route('reviewer-dashboard')}}"> Manage Post Request </a>
        @endcan
    <a href="{{route('posts.index')}}">  Public Post </a>

</nav>

@if ($errors->any())
    <div class="alert alert-danger" style="background: rgb(255 0 0 / 0.84); font-weight: bolder; color:white">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@error('email')
<span class="text-danger">{{ $message }}</span>
@enderror


{{ $slot }}
</body>
</html>
