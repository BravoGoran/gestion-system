<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navegación</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('empleados.index') }}">Empleados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('proyectos.index') }}">Proyectos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tareas.index') }}">Tareas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('horas.index') }}">Horas Trabajadas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('facturas.index') }}">Facturas</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('registro') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('registro') }}">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button>logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
</div>
</nav>
