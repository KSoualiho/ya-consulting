<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YA Consulting - Tableau de Bord</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-variant": "#e1e2ea",
                        "surface-container-lowest": "#ffffff",
                        "on-surface": "#191c21",
                        "on-primary-fixed-variant": "#004491",
                        "tertiary-fixed": "#ffdbcc",
                        "on-secondary-fixed": "#041b3c",
                        "outline-variant": "#c2c6d4",
                        "on-primary-container": "#bbd0ff",
                        "error-container": "#ffdad6",
                        "on-secondary": "#ffffff",
                        "secondary": "#4c5e84",
                        "on-secondary-fixed-variant": "#34476a",
                        "on-background": "#191c21",
                        "tertiary-container": "#983c00",
                        "surface-container-high": "#e7e8f0",
                        "primary": "#003f87",
                        "primary-fixed": "#d7e2ff",
                        "secondary-container": "#bfd2fd",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "secondary-fixed-dim": "#b3c7f1",
                        "on-primary-fixed": "#001a40",
                        "surface-container-highest": "#e1e2ea",
                        "outline": "#727784",
                        "on-tertiary-fixed": "#351000",
                        "on-error-container": "#93000a",
                        "error": "#ba1a1a",
                        "surface": "#f9f9ff",
                        "surface-dim": "#d9d9e2",
                        "background": "#f9f9ff",
                        "on-tertiary-container": "#ffc2a7",
                        "surface-container": "#ededf6",
                        "inverse-on-surface": "#f0f0f9",
                        "surface-container-low": "#f2f3fc",
                        "inverse-primary": "#acc7ff",
                        "on-primary": "#ffffff",
                        "tertiary": "#722b00",
                        "primary-container": "#0056b3",
                        "on-tertiary": "#ffffff",
                        "inverse-surface": "#2e3037",
                        "on-surface-variant": "#424752",
                        "on-secondary-container": "#475a7f",
                        "tertiary-fixed-dim": "#ffb694",
                        "primary-fixed-dim": "#acc7ff",
                        "surface-bright": "#f9f9ff",
                        "on-error": "#ffffff",
                        "surface-tint": "#115cb9",
                        "secondary-fixed": "#d7e2ff"
                    },
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    fontFamily: {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface selection:bg-secondary-container selection:text-on-secondary-container">
<!-- DEBUG RÔLE -->
<div style="background: #ff9800; color: white; padding: 10px; margin: 10px; border-radius: 5px; position: fixed; bottom: 10px; right: 10px; z-index: 9999;">
    <strong>Email:</strong> {{ Auth::user()->email ?? 'Non connecté' }}<br>
    <strong>Rôle:</strong> {{ Auth::user()->role ?? 'Non défini' }}
</div>
<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 z-50 bg-[#f2f3fc] dark:bg-slate-900 flex flex-col p-6 space-y-2 font-['Inter'] text-sm font-medium tracking-wide">
    <div class="flex items-center space-x-3 mb-10 px-2">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003f87] to-[#0056b3] flex items-center justify-center text-white shadow-md">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">landscape</span>
        </div>
        <div>
            <h1 class="text-lg font-black text-[#191c21] dark:text-white leading-tight">YA Consulting</h1>
            <p class="text-[10px] uppercase tracking-widest text-[#424752] opacity-70">Gestion d'interventions</p>
        </div>
    </div>
    
    <nav class="flex-grow space-y-1">
        <a class="flex items-center space-x-3 p-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg hover:translate-x-1 duration-300 transition-all" href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Tableau de Bord</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('clients.index') }}">
            <span class="material-symbols-outlined">group</span>
            <span>Clients</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('interventions.index') }}">
            <span class="material-symbols-outlined">engineering</span>
            <span>Interventions</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('techniciens.index') }}">
            <span class="material-symbols-outlined">badge</span>
            <span>Techniciens</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('rapports.index') }}">
            <span class="material-symbols-outlined">description</span>
            <span>Rapports</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('statistiques.index') }}">
            <span class="material-symbols-outlined">monitoring</span>
            <span>Statistiques</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('planning.index') }}">
            <span class="material-symbols-outlined">calendar_month</span>
            <span>Planning</span>
        </a>
         <!-- AJOUTE ICI LE LIEN ADMINISTRATION -->
    @if(auth()->user()->role === 'admin')
    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 mt-4 text-white bg-gradient-to-br from-[#003f87] to-[#0056b3] rounded-lg shadow-lg">
        <span class="material-symbols-outlined">admin_panel_settings</span>
        <span>Administration</span>
    </a>
    @endif
    </nav>
    
    <div class="mt-auto pt-6 space-y-1">
        <a href="{{ route('interventions.create') }}" class="w-full flex items-center justify-center space-x-2 py-3 mb-4 bg-[#003f87] text-white rounded-lg font-bold text-xs uppercase tracking-widest hover:bg-[#0056b3] transition-colors shadow-sm">
            <span class="material-symbols-outlined text-sm">add</span>
            <span>Nouvelle Intervention</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-error transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span>Déconnexion</span>
            </button>
        </form>
    </div>
</aside>

<!-- DEBUG : Afficher le rôle de l'utilisateur connecté -->
<div style="background: yellow; padding: 10px; margin: 10px;">
    <strong>DEBUG:</strong><br>
    Email: {{ Auth::user()->email ?? 'Non connecté' }}<br>
    Rôle: {{ Auth::user()->role ?? 'Non défini' }}
</div>

<!-- TopNavBar -->
<header class="fixed top-0 left-64 right-0 z-40 bg-[#f9f9ff]/80 dark:bg-slate-950/80 backdrop-blur-xl h-16 flex items-center justify-between px-8 text-[#003f87] font-['Inter'] font-medium text-sm tracking-tight shadow-sm">
    <div class="flex items-center bg-[#f2f3fc] dark:bg-slate-900 rounded-full px-4 py-1.5 w-96 group focus-within:ring-2 ring-primary/20 transition-all">
        <span class="material-symbols-outlined text-on-surface-variant text-lg">search</span>
        <input class="bg-transparent border-none focus:ring-0 text-sm w-full placeholder:text-on-surface-variant/50" placeholder="Rechercher une intervention, un technicien..." type="text" id="globalSearch">
    </div>
    <div class="flex items-center space-x-6">
        <div class="flex items-center space-x-2">
          <a href="{{ route('notifications.index') }}" 
   class="p-2 text-[#424752] hover:bg-[#ededf6] rounded-full transition-colors relative">
    <span class="material-symbols-outlined">notifications</span>
    <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-surface"></span>
</a>
        </div>
        <div class="h-8 w-px bg-outline-variant/30"></div>
        <div class="flex items-center space-x-3">
            <div class="text-right">
                <p class="text-xs font-bold text-[#191c21]">{{ Auth::user()->name ?? 'Marc-Antoine' }}</p>
                <p class="text-[10px] text-[#424752]">{{ Auth::user()->role ?? 'Superviseur' }}</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'MA', 0, 1) }}
            </div>
        </div>
    </div>
</header>

<!-- Main Canvas -->
<main class="ml-64 pt-24 px-8 pb-12">
    <!-- Page Header -->
    <header class="mb-12">
        <h2 class="text-3xl font-extrabold text-on-surface tracking-tighter mb-2">Tableau de bord</h2>
        <p class="text-on-surface-variant max-w-2xl">Bienvenue sur votre espace de pilotage Azure Meridian. Voici la situation de vos interventions en temps réel.</p>
    </header>

    <!-- KPI Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- KPI 1 -->
        <div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col space-y-4 hover:shadow-2xl hover:shadow-on-surface/5 transition-all group">
            <div class="flex justify-between items-start">
                <div class="p-3 bg-primary/5 rounded-lg group-hover:bg-primary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">calendar_today</span>
                </div>
                <span class="text-xs font-bold text-primary px-2 py-1 bg-primary/10 rounded-full">Aujourd'hui</span>
            </div>
            <div>
                <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest">Interventions du jour</h3>
                <p class="text-4xl font-black text-on-surface mt-1">{{ $interventionsAujourdhui ?? 0 }}</p>
            </div>
            <div class="flex items-center text-xs text-on-surface-variant">
                <span class="text-green-600 font-bold flex items-center mr-1">
                    <span class="material-symbols-outlined text-sm">trending_up</span> +12%
                </span>
                <span>vs hier</span>
            </div>
        </div>
        
        <!-- KPI 2 -->
        <div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col space-y-4 hover:shadow-2xl hover:shadow-on-surface/5 transition-all group">
            <div class="flex justify-between items-start">
                <div class="p-3 bg-tertiary/5 rounded-lg group-hover:bg-tertiary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                <span class="text-xs font-bold text-tertiary px-2 py-1 bg-tertiary/10 rounded-full">Priorité</span>
            </div>
            <div>
                <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest">En cours</h3>
                <p class="text-4xl font-black text-on-surface mt-1">{{ $interventionsEnCours ?? 0 }}</p>
            </div>
            <div class="flex items-center text-xs text-on-surface-variant">
                <span class="text-tertiary font-bold flex items-center mr-1">
                    <span class="material-symbols-outlined text-sm">schedule</span> {{ $urgentes ?? 0 }} urgentes
                </span>
            </div>
        </div>
        
        <!-- KPI 3 -->
        <div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col space-y-4 hover:shadow-2xl hover:shadow-on-surface/5 transition-all group">
            <div class="flex justify-between items-start">
                <div class="p-3 bg-secondary/5 rounded-lg group-hover:bg-secondary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined">task_alt</span>
                </div>
                <span class="text-xs font-bold text-secondary px-2 py-1 bg-secondary/10 rounded-full">Succès</span>
            </div>
            <div>
                <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest">Terminées</h3>
                <p class="text-4xl font-black text-on-surface mt-1">{{ $interventionsTerminees ?? 0 }}</p>
            </div>
            <div class="flex items-center text-xs text-on-surface-variant">
                <span class="text-green-600 font-bold flex items-center mr-1">
                    <span class="material-symbols-outlined text-sm">check</span> {{ $tauxReussite ?? 0 }}%
                </span>
                <span>taux de complétion</span>
            </div>
        </div>
    </div>

    <!-- Main Content Area: Asymmetric Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activities (Span 2) -->
        <div class="lg:col-span-2 flex flex-col space-y-6">
            <div class="flex justify-between items-end">
                <h3 class="text-xl font-bold tracking-tight text-on-surface">Activités récentes</h3>
                <a href="{{ route('interventions.index') }}" class="text-xs font-bold text-primary hover:underline transition-all">Voir tout l'historique</a>
            </div>
            <div class="bg-surface-container-low rounded-2xl overflow-hidden">
                <div class="divide-y divide-outline-variant/10">
                    @forelse($activitesRecentes ?? [] as $activite)
                    <div class="flex items-center justify-between p-6 hover:bg-surface-container-lowest transition-all group cursor-pointer">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-white shadow-sm flex-shrink-0 bg-primary/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary">{{ $activite['icon'] ?? 'task_alt' }}</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-on-surface">{{ $activite['title'] ?? 'Activité' }}</p>
                                <p class="text-xs text-on-surface-variant">{{ $activite['description'] ?? '' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider mb-1">{{ $activite['time'] ?? '' }}</p>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-700">SUCCÈS</span>
                        </div>
                    </div>
                    @empty
                    <div class="flex items-center justify-between p-6">
                        <p class="text-on-surface-variant">Aucune activité récente</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Map/Focus Panel (Span 1) -->
        <div class="flex flex-col space-y-6">
            <h3 class="text-xl font-bold tracking-tight text-on-surface">Vue du Terrain</h3>
            <div class="bg-surface-container-low rounded-2xl h-[480px] overflow-hidden relative group">
                <img alt="Satellite map" class="w-full h-full object-cover filter saturate-0 opacity-40 group-hover:scale-105 transition-transform duration-700" src="https://images.unsplash.com/photo-1524661135-423995f22d0z?w=800&h=600&fit=crop">
                <div class="absolute inset-0 bg-gradient-to-t from-[#003f87]/20 to-transparent"></div>
                
                <div class="absolute top-6 left-6 right-6 flex flex-col space-y-2">
                    <div class="bg-surface-container-lowest/90 backdrop-blur-md p-4 rounded-xl shadow-lg">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-[10px] font-black uppercase tracking-widest text-primary">Live Techniciens</p>
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-ping"></span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-on-surface">Actifs</span>
                                <span class="text-xs font-bold text-on-surface">{{ $techniciensActifs ?? 12 }} / {{ $totalTechniciens ?? 15 }}</span>
                            </div>
                            <div class="w-full bg-surface-container h-1 rounded-full overflow-hidden">
                                <div class="bg-primary h-full w-[{{ $tauxActivite ?? 80 }}%] rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute bottom-6 left-6 right-6">
                    <button class="w-full py-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-primary hover:text-white transition-all shadow-xl">
                        Agrandir la carte
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- FAB -->
<a href="{{ route('interventions.create') }}" class="fixed bottom-8 right-8 w-16 h-16 rounded-full bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white shadow-2xl flex items-center justify-center group hover:scale-110 active:scale-95 transition-all duration-300 z-50">
    <span class="material-symbols-outlined text-3xl group-hover:rotate-90 transition-transform">add</span>
</a>

<script>
    // Recherche globale
    document.getElementById('globalSearch').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            let searchTerm = this.value.toLowerCase();
            window.location.href = "{{ route('interventions.index') }}?search=" + encodeURIComponent(searchTerm);
        }
    });
</script>

</body>
</html>