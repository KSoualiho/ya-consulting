<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YA Consulting - Gestion des Clients</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
        .signature-gradient {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 100%);
        }
        .glass-layer {
            backdrop-filter: blur(20px);
        }
        .ambient-shadow {
            box-shadow: 0 8px 40px rgba(25, 28, 33, 0.06);
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface">
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
        <a class="flex items-center gap-3 px-4 py-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg transition-all duration-200" href="{{ route('clients.index') }}">
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

<!-- TopNavBar -->
<header class="fixed top-0 right-0 left-64 h-16 z-40 flex justify-between items-center px-8 bg-[#f9f9ff]/80 backdrop-blur-xl shadow-sm transition-colors duration-200">
    <div class="flex items-center flex-1">
        <div class="relative w-full max-w-md">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/50 text-xl">search</span>
            <input id="searchClient" class="w-full bg-surface-container-low border-none rounded-lg py-2 pl-10 pr-4 focus:ring-1 focus:ring-primary/20 text-sm placeholder:text-on-surface-variant/40" placeholder="Rechercher un client..." type="text">
        </div>
    </div>
    <div class="flex items-center space-x-4">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'MA', 0, 1) }}
            </div>
            <div class="hidden lg:block text-right">
                <p class="text-xs font-bold leading-none">{{ Auth::user()->name ?? 'Marc-Antoine D.' }}</p>
                <p class="text-[10px] text-on-surface-variant/60 font-medium">{{ Auth::user()->role ?? 'Administrateur' }}</p>
            </div>
        </div>
    </div>
</header>

<!-- Main Canvas -->
<main class="ml-64 pt-16 min-h-screen">
    <div class="p-10 space-y-10">
        <!-- Header Section -->
        <div class="flex justify-between items-end">
            <div class="space-y-1">
                <span class="text-xs font-bold tracking-[0.2em] text-primary uppercase">Répertoire</span>
                <h2 class="text-4xl font-extrabold text-on-surface tracking-tight">Gestion des Clients</h2>
                <p class="text-on-surface-variant text-sm max-w-xl">Pilotez votre portefeuille client, gérez les contacts et coordonnez vos interventions stratégiques avec une interface épurée.</p>
            </div>
            <button onclick="openAddModal()" class="signature-gradient text-white px-6 py-3 rounded-xl font-semibold flex items-center space-x-2 shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all duration-200">
                <span class="material-symbols-outlined">add</span>
                <span>Nouveau Client</span>
            </button>
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

        <!-- Bento List Container -->
        <section class="bg-surface-container-low rounded-[2rem] p-4 overflow-hidden">
            <div class="bg-surface-container-lowest rounded-[1.5rem] overflow-hidden">
                <table class="w-full text-left border-collapse" id="clientsTable">
                    <thead>
                        <tr class="text-[11px] uppercase tracking-widest text-on-surface-variant/60 font-bold border-none">
                            <th class="px-8 py-6 font-bold">Nom de l'entreprise</th>
                            <th class="px-8 py-6 font-bold">Contact Principal</th>
                            <th class="px-8 py-6 font-bold">Téléphone</th>
                            <th class="px-8 py-6 font-bold">Email professionnel</th>
                            <th class="px-8 py-6 font-bold">Localisation</th>
                            <th class="px-8 py-6 text-right font-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container-low">
                        @foreach($clients as $client)
                        <tr class="hover:bg-surface-container-low/50 transition-colors group">
                            <td class="px-8 py-5">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-secondary-container rounded-lg flex items-center justify-center text-on-secondary-container font-black text-xs">
                                        {{ substr($client->nom_entreprise, 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-on-surface text-sm">{{ $client->nom_entreprise }}</p>
                                        <p class="text-[10px] text-on-surface-variant/50">ID: CL-{{ str_pad($client->id, 5, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm text-on-surface-variant">{{ $client->contact }}</td>
                            <td class="px-8 py-5 text-sm font-mono text-on-surface-variant">{{ $client->telephone }}</td>
                            <td class="px-8 py-5 text-sm text-on-surface-variant">{{ $client->email ?? '-' }}</td>
                            <td class="px-8 py-5 text-sm text-on-surface-variant">{{ $client->ville ?? 'Non renseignée' }}</td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="editClient({{ $client->id }})" class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors" title="Modifier">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </button>
                                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce client ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors" title="Supprimer">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </form>
                                    <a href="{{ route('clients.show', $client) }}" class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center text-on-surface-variant transition-colors" title="Voir">
                                        <span class="material-symbols-outlined text-lg">visibility</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-8 flex justify-between items-center bg-surface-container-low/30">
                    <p class="text-xs text-on-surface-variant/60 font-medium">Affichage de 1-{{ $clients->count() }} sur {{ $clients->total() }} clients</p>
                    <div class="flex space-x-2">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- Modal Ajouter Client -->
<div id="addModal" class="fixed inset-0 z-[100] hidden items-center justify-end">
    <div class="absolute inset-0 bg-on-surface/30 backdrop-blur-sm"></div>
    <div class="relative w-full max-w-2xl h-full bg-surface-container-lowest shadow-[0_8px_40px_rgba(25,28,33,0.15)] overflow-y-auto no-scrollbar flex flex-col p-0">
        <div class="sticky top-0 z-10 bg-surface-container-lowest/90 backdrop-blur-md px-10 pt-12 pb-6 flex justify-between items-start">
            <div class="space-y-1">
                <span class="text-xs font-bold tracking-[0.2em] text-primary uppercase">Nouveau Profil</span>
                <h3 class="text-3xl font-extrabold text-on-surface tracking-tight">Ajouter un Client</h3>
            </div>
            <button onclick="closeAddModal()" class="w-12 h-12 rounded-full bg-surface-container-low hover:bg-surface-container flex items-center justify-center transition-all">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        
        <form action="{{ route('clients.store') }}" method="POST" class="flex-grow px-10 pb-12 space-y-12 mt-4">
            @csrf
            <div class="space-y-8">
                <div class="space-y-6">
                    <h4 class="text-xs font-black uppercase tracking-widest text-on-surface-variant/40 border-b border-outline-variant/10 pb-2">Identité</h4>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider ml-1">Nom de l'entreprise *</label>
                            <input type="text" name="nom_entreprise" class="w-full bg-surface-container-low border-none rounded-xl py-4 px-5 focus:ring-1 focus:ring-primary/20 text-sm" placeholder="ex: Azure Meridian SARL" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider ml-1">Contact Principal *</label>
                            <input type="text" name="contact" class="w-full bg-surface-container-low border-none rounded-xl py-4 px-5 focus:ring-1 focus:ring-primary/20 text-sm" placeholder="Prénom Nom" required>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <h4 class="text-xs font-black uppercase tracking-widest text-on-surface-variant/40 border-b border-outline-variant/10 pb-2">Coordonnées</h4>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider ml-1">Téléphone *</label>
                            <input type="tel" name="telephone" class="w-full bg-surface-container-low border-none rounded-xl py-4 px-5 focus:ring-1 focus:ring-primary/20 text-sm font-mono" placeholder="+33 0 00 00 00 00" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider ml-1">Email</label>
                            <input type="email" name="email" class="w-full bg-surface-container-low border-none rounded-xl py-4 px-5 focus:ring-1 focus:ring-primary/20 text-sm" placeholder="contact@entreprise.com">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider ml-1">Adresse</label>
                        <input type="text" name="adresse" class="w-full bg-surface-container-low border-none rounded-xl py-4 px-5 focus:ring-1 focus:ring-primary/20 text-sm" placeholder="Numéro, Rue, CP et Ville">
                    </div>
                </div>
            </div>
            
            <div class="sticky bottom-0 bg-surface-container-lowest/90 backdrop-blur-md px-10 py-8 border-t border-outline-variant/10 flex justify-end space-x-4">
                <button type="button" onclick="closeAddModal()" class="px-8 py-3 rounded-xl text-on-surface font-semibold hover:bg-surface-container transition-all">
                    Annuler
                </button>
                <button type="submit" class="signature-gradient text-white px-10 py-3 rounded-xl font-bold shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all duration-200">
                    Enregistrer le Client
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
        document.getElementById('addModal').classList.add('flex');
    }
    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
        document.getElementById('addModal').classList.remove('flex');
    }
    function editClient(id) {
        window.location.href = '/clients/' + id + '/edit';
    }
    
    // Recherche
    document.getElementById('searchClient').addEventListener('keyup', function() {
        let searchTerm = this.value.toLowerCase();
        let rows = document.querySelectorAll('#clientsTable tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>

</body>
</html>