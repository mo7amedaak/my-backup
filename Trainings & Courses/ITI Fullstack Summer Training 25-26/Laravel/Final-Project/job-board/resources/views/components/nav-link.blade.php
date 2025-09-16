<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">JobBoard</a>
        <div class="d-flex">
            <span class="navbar-text text-white me-3">
                Welcome, {{ Auth::user()->name }}
            </span>
            <a class="btn btn-outline-light btn-sm" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>