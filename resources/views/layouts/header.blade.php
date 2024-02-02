<style>
    .navbar-nav.custom-flex {
        display: flex;
        justify-content: space-around;
        width: 90%;
    }

/* .dropdown:hover>.dropdown-menu {
  display: block;
} 

.dropdown>.dropdown-toggle:active {

    pointer-events: none;
}
.dropend:hover>.dropdown-menu {
  display: block;
}

.dropend>.dropdown-toggle:active {

    pointer-events: none;
} */

</style>


<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Edu<span class="text-success">HUB</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 custom-flex">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Home</a>
                </li>
                
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.page')}}">Users</a>
                    </li>
                @endif

                <li class="nav-item dropdown">
                    @if (Auth::user()->role == 'admin')
                        <a class="nav-link" href="{{route('admin.all.tasks')}}">Tasks</a>
                    @else
                    <a class="nav-link " href="{{route('user.tasks')}}">Tasks for me</a>
                    @endif
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ Auth::user()->firstName }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-center" href="#">profile</a></li>
                        <li><a class="dropdown-item text-center" href="{{ route('logout') }}">log out</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


