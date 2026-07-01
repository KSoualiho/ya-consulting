<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YA Consulting - Interventions</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
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
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .signature-gradient {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 100%);
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen">
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
       <a class="flex items-center gap-3 px-4 py-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg transition-all duration-200" href="{{ route('interventions.index') }}">
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

<!-- Main Wrapper -->
<main class="pl-64 flex flex-col min-h-screen">
    <!-- TopNavBar -->
    <header class="fixed top-0 right-0 left-64 z-40 bg-[#f9f9ff]/80 backdrop-blur-xl flex justify-between items-center h-16 px-10 shadow-sm">
        <div class="flex items-center flex-1 max-w-xl">
            <div class="relative w-full">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/50">search</span>
                <input id="searchIntervention" class="w-full bg-surface-container-low border-none rounded-xl py-2 pl-10 pr-4 focus:ring-1 focus:ring-primary/20 text-sm" placeholder="Rechercher une intervention..." type="text">
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-3 cursor-pointer group">
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                    {{ substr(Auth::user()->name ?? 'JD', 0, 1) }}
                </div>
                <div class="hidden lg:block">
                    <p class="text-xs font-bold text-on-surface">{{ Auth::user()->name ?? 'Jean-Luc Picard' }}</p>
                    <p class="text-[10px] text-on-surface-variant font-medium">{{ Auth::user()->role ?? 'Administrateur' }}</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="mt-16 p-10 flex flex-col space-y-12">
        <!-- Page Header -->
        <div class="flex justify-between items-end">
            <div class="space-y-1">
                <h2 class="text-3xl font-black text-on-surface tracking-tight">Liste des interventions</h2>
                <p class="text-on-surface-variant text-sm font-medium">Gérez et suivez le planning des techniciens en temps réel.</p>
            </div>
            @if(Auth::user()->role !== 'technicien')
    <a href="{{ route('interventions.create') }}" class="signature-gradient text-white px-6 py-3 rounde">
        <span class="material-symbols-outlined text-lg">add</span>
        <span>Nouvelle Intervention</span>
    </a>
@endif
        </div>

        <!-- Messages flash -->
        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="space-y-8">
            <!-- Filters Segmented Control -->
            <div class="flex flex-wrap gap-2 p-1.5 bg-surface-container-low w-fit rounded-2xl">
                <button onclick="filterByStatus('')" class="filter-btn px-6 py-2.5 rounded-xl text-xs font-bold tracking-wider signature-gradient text-white shadow-md transition-all">TOUS</button>
                <button onclick="filterByStatus('en_attente')" class="filter-btn px-6 py-2.5 rounded-xl text-xs font-bold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all">EN ATTENTE</button>
                <button onclick="filterByStatus('planifiee')" class="filter-btn px-6 py-2.5 rounded-xl text-xs font-bold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all">PLANIFIÉE</button>
                <button onclick="filterByStatus('en_cours')" class="filter-btn px-6 py-2.5 rounded-xl text-xs font-bold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all">EN COURS</button>
                <button onclick="filterByStatus('terminee')" class="filter-btn px-6 py-2.5 rounded-xl text-xs font-bold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all">TERMINÉE</button>
                <button onclick="filterByStatus('annulee')" class="filter-btn px-6 py-2.5 rounded-xl text-xs font-bold tracking-wider text-on-surface-variant hover:bg-surface-container transition-all">ANNULÉE</button>
            </div>

            <!-- Modern Table Layout -->
            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-[0_32px_64px_-12px_rgba(25,28,33,0.04)] ring-1 ring-black/[0.02]">
                <table class="w-full text-left border-collapse" id="interventionsTable">
                    <thead>
                        <tr class="bg-surface-container-low">
                            <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-on-surface-variant/60">Date</th>
                            <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-on-surface-variant/60">Client</th>
                            <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-on-surface-variant/60">Technicien</th>
                            <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-on-surface-variant/60">Statut</th>
                            <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-on-surface-variant/60 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/10">
                        @foreach($interventions as $intervention)
                        <tr class="hover:bg-surface transition-colors group intervention-row" data-statut="{{ $intervention->statut }}">
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-on-surface">{{ $intervention->date_heure ? date('d M Y', strtotime($intervention->date_heure)) : 'Non planifiée' }}</span>
                                    <span class="text-xs text-on-surface-variant font-medium">{{ $intervention->date_heure ? date('H:i', strtotime($intervention->date_heure)) : '-' }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-primary/5 flex items-center justify-center text-primary font-bold text-xs">
                                        {{ substr($intervention->client->nom_entreprise ?? 'NC', 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-on-surface">{{ $intervention->client->nom_entreprise ?? 'N/A' }}</p>
                                        <p class="text-[10px] text-on-surface-variant font-medium">{{ $intervention->client->ville ?? 'FR' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-2">
                                    <div class="w-7 h-7 rounded-full bg-primary-fixed flex items-center justify-center text-primary text-xs font-bold">
                                        {{ substr($intervention->technicien->nom ?? 'NA', 0, 1) }}
                                    </div>
                                    <span class="text-sm font-medium text-on-surface-variant">{{ $intervention->technicien->nom ?? 'Non assigné' }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @php
                                    $statusConfig = [
                                        'planifiee' => ['bg-secondary-container text-on-secondary-container', 'PLANIFIÉE'],
                                        'en_cours' => ['bg-primary-fixed text-on-primary-fixed-variant', 'EN COURS'],
                                        'terminee' => ['bg-green-100 text-green-700', 'TERMINÉE'],
                                        'annulee' => ['bg-error-container text-on-error-container', 'ANNULÉE'],
                                        'en_attente' => ['bg-surface-container text-on-surface-variant', 'EN ATTENTE'],
                                    ];
                                    $config = $statusConfig[$intervention->statut] ?? $statusConfig['en_attente'];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black tracking-wider {{ $config[0] }}">
                                    @if($intervention->statut == 'en_cours')
                                    <span class="w-1.5 h-1.5 bg-primary rounded-full mr-2 animate-pulse"></span>
                                    @endif
                                    {{ $config[1] }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('interventions.show', $intervention) }}" class="p-2 text-on-surface-variant/40 hover:text-primary transition-colors" title="Voir">
                                        <span class="material-symbols-outlined">visibility</span>
                                    </a>
                                    @if(Auth::user()->role !== 'technicien')
    <a href="{{ route('interventions.edit', $intervention) }}" class="p-2 text-on-surface-variant/40 ho">
        <span class="material-symbols-outlined">edit</span>
    </a>
@endif
                                    @if($intervention->statut != 'terminee' && $intervention->statut != 'annulee')
                                    <button onclick="updateStatus({{ $intervention->id }})" class="p-2 text-on-surface-variant/40 hover:text-primary transition-colors" title="Changer statut">
                                        <span class="material-symbols-outlined">sync</span>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $interventions->links() }}
            </div>

            <!-- Footer Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="p-8 bg-surface-container-low rounded-3xl space-y-4">
                    <p class="text-[10px] uppercase font-black tracking-[0.2em] text-on-surface-variant/60">Taux de réalisation</p>
                    <div class="flex items-end justify-between">
                        <span class="text-4xl font-black text-on-surface tracking-tighter">{{ $tauxReussite ?? 94.2 }}%</span>
                        <span class="text-green-600 text-xs font-bold flex items-center mb-1">
                            <span class="material-symbols-outlined text-sm mr-1">trending_up</span>
                            +2.4%
                        </span>
                    </div>
                    <div class="h-1.5 w-full bg-outline-variant/10 rounded-full overflow-hidden">
                        <div class="h-full signature-gradient w-[{{ $tauxReussite ?? 94 }}%] rounded-full"></div>
                    </div>
                </div>
                <div class="p-8 bg-surface-container-low rounded-3xl space-y-4">
                    <p class="text-[10px] uppercase font-black tracking-[0.2em] text-on-surface-variant/60">Temps moyen</p>
                    <div class="flex items-end justify-between">
                        <span class="text-4xl font-black text-on-surface tracking-tighter">{{ $tempsMoyen ?? '1h 12m' }}</span>
                    </div>
                    <div class="h-1.5 w-full bg-outline-variant/10 rounded-full overflow-hidden">
                        <div class="h-full bg-secondary w-[70%] rounded-full"></div>
                    </div>
                </div>
                <div class="md:col-span-2 p-8 bg-primary/5 rounded-3xl flex items-center justify-between border border-primary/10">
                    <div class="space-y-1">
                        <h4 class="font-black text-primary text-xl">Nouveau module disponible</h4>
                        <p class="text-on-surface-variant text-sm max-w-xs">Optimisez vos tournées avec notre nouvel algorithme d'IA prédictive.</p>
                    </div>
                    <button class="bg-primary text-white p-4 rounded-2xl shadow-lg hover:shadow-primary/30 transition-all">
                        <span class="material-symbols-outlined">bolt</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Filtre par statut
    function filterByStatus(status) {
        let rows = document.querySelectorAll('.intervention-row');
        rows.forEach(row => {
            if (status === '' || row.dataset.statut === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('signature-gradient', 'text-white', 'shadow-md');
            btn.classList.add('text-on-surface-variant');
        });
        event.target.classList.add('signature-gradient', 'text-white', 'shadow-md');
    }

    // Changer statut
    function updateStatus(id) {
        let newStatus = prompt('Changer le statut (en_cours, terminee, annulee):');
        if (newStatus && ['en_cours', 'terminee', 'annulee'].includes(newStatus)) {
            fetch(`/interventions/${id}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ statut: newStatus })
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Erreur lors du changement de statut');
                }
            });
        }
    }

    // Recherche
    document.getElementById('searchIntervention').addEventListener('keyup', function() {
        let searchTerm = this.value.toLowerCase();
        let rows = document.querySelectorAll('#interventionsTable tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>

</body>
</html>