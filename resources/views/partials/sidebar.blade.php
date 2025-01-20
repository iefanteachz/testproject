<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            @foreach (\Illuminate\Support\Facades\Route::getRoutes() as $route)
                @if ($route->getName() && str_contains($route->getName(), 'admin')) <!-- Customize this filter -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($route->getName()) ? 'active' : '' }}" href="{{ route($route->getName()) }}">
                            {{ ucfirst(str_replace('admin.', '', $route->getName())) }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>