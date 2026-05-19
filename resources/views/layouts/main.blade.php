<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YA Consulting - @yield('title', 'Gestion des interventions')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-surface font-body text-on-surface antialiased">

<!-- Sidebar - Version Dashboard -->
<aside class="h-screen w-64 fixed left-0 top-0 bg-[#f2f3fc] flex flex-col py-6 px-4 font-sans z-50">
    <div class="mb-10 px-4">
        <h1 class="text-lg font-black text-[#191c21]">YA Consulting</h1>
        <p class="text-xs text-on-surface-variant opacity-70">GESTION D'INTERVENTIONS</p>
    </div>
    
    <nav class="flex-1 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-sm font-medium">Tableau de Bord</span>
        </a>
        <a href="{{ route('clients.index') }}" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200">
            <span class="material-symbols-outlined">group</span>
            <span class="text-sm font-medium">Clients</span>
        </a>
        <a href="{{ route('interventions.index') }}" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200">
            <span class="material-symbols-outlined">engineering</span>
            <span class="text-sm font-medium">Interventions</span>
        </a>
        <a href="{{ route('techniciens.index') }}" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200">
            <span class="material-symbols-outlined">badge</span>
            <span class="text-sm font-medium">Techniciens</span>
        </a>
        <a href="{{ route('rapports.index') }}" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200">
            <span class="material-symbols-outlined">description</span>
            <span class="text-sm font-medium">Rapports</span>
        </a>
        <a href="{{ route('statistiques.index') }}" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200">
            <span class="material-symbols-outlined">leaderboard</span>
            <span class="text-sm font-medium">Statistiques</span>
        </a>
        <a href="{{ route('planning.index') }}" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200">
            <span class="material-symbols-outlined">calendar_month</span>
            <span class="text-sm font-medium">Planning</span>
        </a>
    </nav>
    
    <div class="mt-auto px-4">
        <div class="flex items-center gap-3 px-4 py-3 mb-4">
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
            </div>
            <div>
                <p class="text-sm font-semibold text-on-surface">{{ Auth::user()->name ?? 'Admin' }}</p>
                <p class="text-[10px] text-on-surface-variant">{{ Auth::user()->role ?? 'Administrateur' }}</p>

                @if(auth()->user()->role === 'admin')
<a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all" href="{{ route('admin.users.index') }}">
    <span class="material-symbols-outlined">admin_panel_settings</span>
    <span>Administration</span>
</a>
@endif
            </div>
        </div>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-[#424752] hover:bg-[#ededf6] flex items-center gap-3 px-4 py-3 rounded-lg transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm font-medium">Déconnexion</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="ml-64 min-h-screen bg-surface-container-low">
    <div class="p-8">
        @yield('content')
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Menu mobile toggle
    function toggleMobileMenu() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('show');
    }
</script>

<style>
    /* Mobile styles */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            position: fixed;
            z-index: 1000;
            width: 80%;
            max-width: 280px;
        }
        .sidebar.show {
            transform: translateX(0);
        }
        .main-content {
            margin-left: 0 !important;
            padding: 1rem !important;
        }
        .menu-toggle {
            display: block;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: #003f87;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.5rem;
            cursor: pointer;
        }
        table {
            min-width: 600px;
        }
        .card {
            padding: 1rem !important;
        }
        h1, h2 {
            font-size: 1.5rem !important;
        }
        .grid {
            gap: 1rem !important;
        }
    }
</style>
@stack('scripts')
</body>
</html>