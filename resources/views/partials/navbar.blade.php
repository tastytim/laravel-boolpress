@if (Route::has('login'))
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">Home</a>
        <a class="navbar-brand" href="{{ route('welcome') }}">Posts</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
            
            <ul class="navbar-nav d-flex ml-auto mb-2 mb-lg-0">
                @if(Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            </ul>
            @endif
            @else
            <ul class="navbar-nav d-flex mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route("admin.posts.index")}}">
                        My Posts
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex ml-auto mb-2 mb-lg-0">
                <li class="nav-item-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{route('admin.home')}}">Profile
                        </a>
                        <a class="dropdown-item" href="{{route('admin.posts.index')}}">Posts
                        </a>
                    </div>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</nav>
@endif
