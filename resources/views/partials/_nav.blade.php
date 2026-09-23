<nav class="nav">
    <a class="nav-link {{ request()->is('movies*') && !request()->is('movies/featured') ? 'active fw-bold' : '' }}"
       href="{{route('movies.index')}}">All Movies</a>
    <a class="nav-link {{ request()->is('movies/featured') ? 'active fw-bold' : '' }}"
       href="{{route('movies.featured')}}">Featured</a>
</nav>