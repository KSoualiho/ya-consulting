<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'YA Consulting')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

<div class="container-fluid">
    <div class="row">

        {{-- ===== SIDEBAR ===== --}}
        <nav class="col-md-2 d-md-block sidebar">
            <div class="sidebar-sticky">

                {{-- Logo --}}
                <div class="text-center mb-4 mt-3">
                    <h5 class="text-white">YA Consulting</h5>
                    <small class="text-muted">Gestion interventions</small>
                </div>

                {{-- Menu --}}
                <ul class="nav flex-column">

                    {{-- Tableau de bord --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Tableau de Bord
                        </a>
                    </li>

                    {{-- Clients --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('clients.*') ? 'active' : '' }}"
                           href="{{ route('clients.index') }}">
                            <i class="bi bi-people"></i> Clients
                        </a>
                    </li>

                    {{-- Interventions --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('interventions.*') ? 'active' : '' }}"
                           href="{{ route('interventions.index') }}">
                            <i class="bi bi-wrench"></i> Interventions
                        </a>
                    </li>

                    {{-- Techniciens --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('techniciens.*') ? 'active' : '' }}"
                           href="{{ route('techniciens.index') }}">
                            <i class="bi bi-person-badge"></i> Techniciens
                        </a>
                    </li>

                    {{-- Rapports --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rapports.*') ? 'active' : '' }}"
                           href="{{ route('rapports.index') }}">
                            <i class="bi bi-file-text"></i> Rapports
                        </a>
                    </li>

                    {{-- Planning --}}
                    <li class="nav-item">
                      <a href="{{ route('planning.index') }}" class="nav-link">
                        <i class="bi bi-calendar"></i> Planning
                      </a>
                    </li>

                    {{-- Statistiques --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('statistiques.*') ? 'active' : '' }}"
                           href="{{ route('statistiques.index') }}">
                            <i class="bi bi-bar-chart"></i> Statistiques
                        </a>
                    </li>

                    {{-- Notifications --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}"
                           href="{{ route('notifications.index') }}">
                            <i class="bi bi-bell"></i> Notifications
                            @if(isset($notificationsNonLues) && $notificationsNonLues > 0)
                                <span class="badge bg-danger rounded-pill ms-2">{{ $notificationsNonLues }}</span>
                            @endif
                        </a>
                    </li>

                </ul>

                <hr class="text-white">

                {{-- Utilisateur connecté --}}
                <div class="user-info text-white text-center">
                    <i class="bi bi-person-circle"></i>
                    {{ Auth::user()->nom ?? 'Admin' }}
                    <br>
                    <small>{{ Auth::user()->role ?? 'Administrateur' }}</small>
                    <hr>
                    {{-- Déconnexion --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-box-arrow-right"></i> Déconnexion
                        </button>
                    </form>
                </div>

            </div>
        </nav>

        {{-- ===== MAIN CONTENT ===== --}}
        <main class="col-md-10 ms-sm-auto px-md-4 main-content">
            @yield('content')
        </main>

    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

@stack('scripts')

</body>
</html>