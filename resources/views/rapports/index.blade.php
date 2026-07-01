<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YA Consulting - Rapports d'Intervention</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "tertiary": "#722b00",
                        "tertiary-fixed-dim": "#ffb694",
                        "on-tertiary": "#ffffff",
                        "error": "#ba1a1a",
                        "on-secondary-fixed": "#041b3c",
                        "outline": "#727784",
                        "surface-bright": "#f9f9ff",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "on-error-container": "#93000a",
                        "surface-container": "#ededf6",
                        "tertiary-container": "#983c00",
                        "on-secondary-fixed-variant": "#34476a",
                        "primary-fixed-dim": "#acc7ff",
                        "on-surface-variant": "#424752",
                        "secondary-fixed-dim": "#b3c7f1",
                        "on-primary-fixed": "#001a40",
                        "on-background": "#191c21",
                        "on-primary-container": "#bbd0ff",
                        "tertiary-fixed": "#ffdbcc",
                        "surface-dim": "#d9d9e2",
                        "surface-container-low": "#f2f3fc",
                        "surface": "#f9f9ff",
                        "primary-container": "#0056b3",
                        "secondary": "#4c5e84",
                        "primary": "#003f87",
                        "background": "#f9f9ff",
                        "on-primary-fixed-variant": "#004491",
                        "inverse-surface": "#2e3037",
                        "outline-variant": "#c2c6d4",
                        "on-surface": "#191c21",
                        "on-error": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed": "#d7e2ff",
                        "inverse-on-surface": "#f0f0f9",
                        "secondary-container": "#bfd2fd",
                        "surface-variant": "#e1e2ea",
                        "on-primary": "#ffffff",
                        "inverse-primary": "#acc7ff",
                        "surface-container-high": "#e7e8f0",
                        "secondary-fixed": "#d7e2ff",
                        "on-secondary": "#ffffff",
                        "surface-tint": "#115cb9",
                        "on-tertiary-fixed": "#351000",
                        "on-tertiary-container": "#ffc2a7",
                        "error-container": "#ffdad6",
                        "on-secondary-container": "#475a7f",
                        "surface-container-highest": "#e1e2ea"
                    },
                    borderRadius: {
                        "DEFAULT": "0.375rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    fontFamily: {
                        "headline": ["Inter"],
                        "display": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .signature-gradient {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 100%);
        }
        .active-nav-glow {
            box-shadow: 0 4px 20px -4px rgba(0, 63, 135, 0.15);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased">
    <!-- Bouton menu hamburger -->
<button onclick="toggleMenu()" class="menu-toggle">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<script>
    function toggleMenu() {
        document.querySelector('.sidebar').classList.toggle('open');
    }
</script>

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
       <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200" href="{{ route('dashboard') }}">
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
        <a class="flex items-center gap-3 px-4 py-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg transition-all duration-200" href="{{ route('rapports.index') }}">
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

<!-- Main Content -->
<main class="ml-72 min-h-screen flex flex-col">
    <!-- Top Navigation Bar -->
    <header class="h-20 flex items-center justify-between px-12 bg-surface">
        <div>
            <h2 class="text-2xl font-black text-on-surface tracking-tighter">Rapports d'Intervention</h2>
            <nav class="flex items-center gap-2 mt-1 text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">
                <span>Archives</span>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-primary">Vue d'ensemble</span>
            </nav>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center bg-surface-container-low px-4 py-2 rounded-md gap-2">
                <span class="material-symbols-outlined text-outline text-sm">search</span>
                <input id="searchRapport" class="bg-transparent border-none focus:ring-0 text-sm w-48 text-on-surface placeholder:text-on-surface-variant/50" placeholder="Rechercher un rapport..." type="text">
            </div>
        </div>
    </header>

    <!-- Messages flash -->
    @if(session('success'))
        <div class="mx-12 mt-4 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mx-12 mt-4 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    <!-- Content Area -->
    <section class="flex-1 flex flex-col p-12">
        @if($rapports->count() > 0)
            <!-- Tableau des rapports -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Intervention</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Client</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Technicien</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Date</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Statut</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($rapports as $rapport)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-medium">{{ $rapport->intervention->numero ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $rapport->intervention->client->nom_entreprise ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $rapport->intervention->technicien->nom ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $rapport->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4">
                                    @if($rapport->valide)
                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">Validé</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">En attente</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('rapports.show', $rapport) }}" class="text-primary hover:text-primary/70 transition-colors">
                                        <span class="material-symbols-outlined">visibility</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $rapports->links() }}
                </div>
            </div>
        @else
            <!-- Empty State Container -->
            <div class="flex-1 bg-surface-container-low rounded-[2rem] flex flex-col items-center justify-center p-20 border border-outline-variant/10">
                <div class="relative mb-12">
                    <div class="absolute inset-0 bg-secondary-container/30 blur-3xl rounded-full scale-150"></div>
                    <div class="relative w-72 h-72 flex items-center justify-center">
                        <div class="absolute w-full h-full border-[0.5px] border-outline-variant/30 rounded-full"></div>
                        <div class="absolute w-[80%] h-[80%] border-[0.5px] border-outline-variant/50 rounded-full"></div>
                        <div class="relative bg-white p-8 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.06)] border border-outline-variant/20 transform -rotate-3 hover:rotate-0 transition-transform duration-700">
                            <div class="flex flex-col gap-4 w-40">
                                <div class="h-2 w-1/2 bg-surface-container rounded-full"></div>
                                <div class="h-2 w-full bg-surface-container-low rounded-full"></div>
                                <div class="h-2 w-[80%] bg-surface-container-low rounded-full"></div>
                                <div class="mt-4 flex justify-between">
                                    <div class="h-6 w-6 bg-primary/10 rounded-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-[12px] text-primary" style="font-variation-settings: 'FILL' 1;">check</span>
                                    </div>
                                    <div class="h-6 w-16 bg-surface-container rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-10 right-4 bg-tertiary-fixed text-on-tertiary-fixed text-[10px] font-black px-3 py-1 rounded-full shadow-sm uppercase tracking-widest">
                            Vide
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-white rounded-xl shadow-xl flex items-center justify-center transform rotate-12">
                            <span class="material-symbols-outlined text-primary text-3xl">description</span>
                        </div>
                    </div>
                </div>
                <div class="text-center max-w-md space-y-4">
                    <h3 class="text-4xl font-black text-on-surface tracking-tighter leading-tight">
                        Aucun rapport disponible pour le moment
                    </h3>
                    <p class="text-on-surface-variant font-medium leading-relaxed">
                        Votre archive de rapports est actuellement vide. Commencez à documenter vos interventions pour centraliser vos données de maintenance et de performance.
                    </p>
                </div>
                <div class="mt-12 flex flex-col items-center gap-6">
                    <a href="{{ route('interventions.index') }}" class="signature-gradient text-white px-8 py-4 rounded-xl font-bold text-sm tracking-wide shadow-xl shadow-primary/20 hover:scale-[1.02] transition-all flex items-center gap-3">
                        <span class="material-symbols-outlined">add_circle</span>
                        Générer un rapport
                    </a>
                    <a href="{{ route('export.rapports-liste') }}" class="btn btn-secondary">
    <i class="bi bi-file-pdf"></i> Exporter tous les rapports
</a>  
                </div>
            </div>
        @endif

        <!-- Contextual Information -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-primary">
                    <span class="material-symbols-outlined text-lg">verified</span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Standardisation</span>
                </div>
                <p class="text-sm font-medium text-on-surface-variant">Tous les rapports générés suivent les normes ISO-9001 pour une qualité d'audit irréprochable.</p>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-primary">
                    <span class="material-symbols-outlined text-lg">cloud_done</span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Sauvegarde Cloud</span>
                </div>
                <p class="text-sm font-medium text-on-surface-variant">Vos documents sont synchronisés en temps réel et accessibles sur tous vos terminaux mobiles.</p>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-primary">
                    <span class="material-symbols-outlined text-lg">analytics</span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Auto-Analyse</span>
                </div>
                <p class="text-sm font-medium text-on-surface-variant">Le système génère automatiquement des graphiques de tendance à partir de vos rapports écrits.</p>
            </div>
        </div>
    </section>
</main>

<script>
    // Recherche
    document.getElementById('searchRapport').addEventListener('keyup', function() {
        let searchTerm = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>

</body>
</html>