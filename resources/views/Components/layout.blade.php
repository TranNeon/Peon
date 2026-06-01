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
        <a href="{{route('logoutFn')}}"> logout </a>
    @endauth
    @guest
        <a href="{{route('register')}}"> sign up </a>
        <a href="{{route('login')}}"> log in  </a>
    @endguest
        @can('review', \App\Models\PostRequest::class)
            <a href="{{route('reviewer-dashboard')}}"> Manage Post Request </a>
        @endcan
    <a href="{{route('posts.index')}}">  Public Post </a>

</nav>
{{ $slot }}
</body>
</html>
