<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YA Consulting - Gestion des Techniciens</title>
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
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .signature-gradient {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 100%);
        }
        .glass-header {
            background: rgba(249, 249, 255, 0.8);
            backdrop-filter: blur(20px);
        }
    </style>
</head>
<body class="bg-surface text-on-surface selection:bg-primary-fixed">

<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 z-50 bg-[#f2f3fc] flex flex-col p-6 space-y-2 font-['Inter'] text-sm font-medium tracking-wide">
    <div class="flex items-center gap-3 mb-10 px-2">
        <div class="w-10 h-10 signature-gradient rounded-lg flex items-center justify-center text-white shadow-lg">
            <span class="material-symbols-outlined">architecture</span>
        </div>
        <div>
            <h1 class="text-lg font-black text-[#191c21] leading-none">YA Consulting</h1>
            <p class="text-[10px] uppercase tracking-[0.1em] text-on-surface-variant mt-1 opacity-70">Gestion d'interventions</p>
        </div>
    </div>
    
    <nav class="flex-1 space-y-1">
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] transition-all rounded-lg duration-300 hover:translate-x-1" href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Tableau de Bord</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] transition-all rounded-lg duration-300 hover:translate-x-1" href="{{ route('clients.index') }}">
            <span class="material-symbols-outlined">group</span>
            <span>Clients</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] transition-all rounded-lg duration-300 hover:translate-x-1" href="{{ route('interventions.index') }}">
            <span class="material-symbols-outlined">engineering</span>
            <span>Interventions</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg duration-300" href="{{ route('techniciens.index') }}">
            <span class="material-symbols-outlined">badge</span>
            <span>Techniciens</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] transition-all rounded-lg duration-300 hover:translate-x-1" href="{{ route('rapports.index') }}">
            <span class="material-symbols-outlined">description</span>
            <span>Rapports</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] transition-all rounded-lg duration-300 hover:translate-x-1" href="{{ route('statistiques.index') }}">
            <span class="material-symbols-outlined">monitoring</span>
            <span>Statistiques</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] transition-all rounded-lg duration-300 hover:translate-x-1" href="{{ route('planning.index') }}">
            <span class="material-symbols-outlined">calendar_month</span>
            <span>Planning</span>
        </a>
    </nav>
    
    <div class="pt-6 mt-6 border-t border-outline-variant/20 space-y-1">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] hover:text-error transition-all rounded-lg duration-300">
                <span class="material-symbols-outlined">logout</span>
                <span>Déconnexion</span>
            </button>
        </form>
    </div>
</aside>

<!-- TopNavBar -->
<header class="fixed top-0 right-0 left-64 h-16 glass-header z-40 flex justify-between items-center px-8">
    <div class="flex items-center flex-1 max-w-md">
        <div class="relative w-full">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
            <input id="searchTechnician" class="w-full bg-surface-container-low border-none rounded-md py-2 pl-10 pr-4 text-sm focus:ring-1 focus:ring-primary placeholder-on-surface-variant/50" placeholder="Rechercher un technicien..." type="text">
        </div>
    </div>
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'MA', 0, 1) }}
            </div>
            <div class="text-right hidden lg:block">
                <p class="text-xs font-bold leading-none">{{ Auth::user()->name ?? 'Marc-Antoine' }}</p>
                <p class="text-[10px] text-on-surface-variant/60 font-medium">{{ Auth::user()->role ?? 'Administrateur' }}</p>
            </div>
        </div>
    </div>
</header>

<!-- Main Canvas -->
<main class="ml-64 pt-24 px-10 pb-12 min-h-screen">
    <!-- Page Header -->
    <header class="flex justify-between items-end mb-12">
        <div class="max-w-2xl">
            <span class="text-xs font-semibold tracking-widest text-primary uppercase mb-2 block">Personnel Terrain</span>
            <h2 class="text-4xl font-bold tracking-tight text-on-surface">Gestion des Techniciens</h2>
            <p class="mt-3 text-on-surface-variant leading-relaxed">Suivez la charge de travail et la disponibilité de vos équipes en temps réel pour optimiser le déploiement de vos interventions.</p>
        </div>
        <button onclick="openAddModal()" class="signature-gradient text-white px-6 py-3 rounded-md font-medium text-sm flex items-center gap-2 shadow-xl hover:shadow-primary/20 transition-all active:scale-95">
            <span class="material-symbols-outlined text-lg">add</span>
            Ajouter un technicien
        </button>
    </header>

    <!-- Messages flash -->
    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
            {{ session('error') }}
        </div>
    @endif

    <!-- Stats Overview -->
    <div class="grid grid-cols-4 gap-6 mb-12">
        <div class="bg-surface-container-low p-6 rounded-xl space-y-2">
            <span class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-wider">Effectif Total</span>
            <div class="text-3xl font-bold text-on-surface">{{ $totalTechniciens ?? 0 }}</div>
            <div class="text-xs text-primary font-medium flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">trending_up</span> +2 ce mois
            </div>
        </div>
        <div class="bg-surface-container-low p-6 rounded-xl space-y-2 border-l-4 border-primary">
            <span class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-wider">Sur le Terrain</span>
            <div class="text-3xl font-bold text-on-surface">{{ $techniciensActifs ?? 0 }}</div>
            <div class="flex items-center gap-2">
                <div class="h-1.5 w-1.5 rounded-full bg-primary animate-pulse"></div>
                <span class="text-xs text-on-surface-variant font-medium">Actuellement actifs</span>
            </div>
        </div>
        <div class="bg-surface-container-low p-6 rounded-xl space-y-2">
            <span class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-wider">Charge Moyenne</span>
            <div class="text-3xl font-bold text-on-surface">{{ $chargeMoyenne ?? 76 }}%</div>
            <div class="h-2 w-full bg-surface-container rounded-full overflow-hidden">
                <div class="h-full bg-primary rounded-full w-[{{ $chargeMoyenne ?? 76 }}%]"></div>
            </div>
        </div>
        <div class="bg-surface-container-low p-6 rounded-xl space-y-2">
            <span class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-wider">Interventions / Jour</span>
            <div class="text-3xl font-bold text-on-surface">{{ $moyenneInterventionsParJour ?? 4.2 }}</div>
            <span class="text-xs text-on-surface-variant font-medium">Moyenne hebdomadaire</span>
        </div>
    </div>

    <div class="flex gap-10">
        <!-- Technician Grid -->
        <div class="flex-1 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($techniciens as $technicien)
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-lg cursor-pointer group transition-all duration-300 hover:shadow-xl" onclick="showTechnicianDetails({{ $technicien->id }})">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold text-xl">
                                {{ substr($technicien->nom, 0, 2) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-on-surface text-lg">{{ $technicien->nom }}</h3>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-secondary-container text-on-secondary-container uppercase tracking-tighter">
                                    {{ $technicien->specialite ?? 'Technicien' }}
                                </span>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-primary">verified_user</span>
                    </div>
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center gap-3 text-on-surface-variant text-sm">
                            <span class="material-symbols-outlined text-base">mail</span>
                            <span>{{ $technicien->email ?? 'Non renseigné' }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-on-surface-variant text-sm">
                            <span class="material-symbols-outlined text-base">call</span>
                            <span>{{ $technicien->telephone ?? 'Non renseigné' }}</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        @php $charge = $technicien->charge ?? 0; @endphp
                        <div class="flex justify-between text-xs font-bold text-on-surface-variant/70 uppercase">
                            <span>Charge de travail</span>
                            <span>{{ $charge }}%</span>
                        </div>
                        <div class="h-2 w-full bg-surface-container rounded-full overflow-hidden">
                            <div class="h-full {{ $charge > 80 ? 'bg-error' : 'signature-gradient' }} rounded-full w-[{{ $charge }}%]"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Focus Panel: Technician Details -->
        <aside id="technicianDetailsPanel" class="w-96 bg-surface-container-lowest rounded-2xl shadow-[0_8px_40px_rgba(25,28,33,0.06)] p-8 sticky top-24 self-start h-[calc(100vh-160px)] flex flex-col">
            <div class="mb-8">
                <h4 class="text-xs font-bold text-on-surface-variant/50 uppercase tracking-widest mb-4">Interventions Assignées</h4>
                <div class="flex items-center gap-3" id="selectedTechnicianInfo">
                    <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold">MV</div>
                    <div>
                        <p class="font-bold text-on-surface leading-tight" id="selectedTechnicianName">Sélectionnez un technicien</p>
                        <p class="text-xs text-on-surface-variant" id="selectedTechnicianCount">0 interventions aujourd'hui</p>
                    </div>
                </div>
            </div>
            <div class="flex-1 overflow-y-auto space-y-6 pr-2" id="interventionsList">
                <div class="text-center text-on-surface-variant py-8">
                    Cliquez sur un technicien pour voir ses interventions
                </div>
            </div>
            <div class="pt-8 border-t border-outline-variant/30 mt-auto">
                <a href="{{ route('planning.index') }}" class="w-full py-4 text-primary text-sm font-bold hover:bg-surface-container-low rounded-lg transition-colors flex items-center justify-center gap-2">
                    Modifier le planning
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>
        </aside>
    </div>
</main>

<!-- Modal Ajouter Technicien -->
<div id="addModal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl w-full max-w-md overflow-hidden shadow-2xl">
        <div class="signature-gradient text-white px-6 py-4 flex justify-between items-center">
            <h3 class="font-bold text-lg">Ajouter un technicien</h3>
            <button onclick="closeAddModal()" class="text-white hover:opacity-80">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="{{ route('techniciens.store') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet *</label>
                <input type="text" name="nom" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                <input type="tel" name="telephone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Spécialité</label>
                <select name="specialite" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    <option value="Électricité">⚡ Électricité</option>
                    <option value="Plomberie">💧 Plomberie</option>
                    <option value="Chauffage">🔥 Chauffage</option>
                    <option value="Climatisation">❄️ Climatisation</option>
                    <option value="Informatique">💻 Informatique</option>
                    <option value="Polyvalent">🔧 Polyvalent</option>
                </select>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="actif" id="actif" value="1" checked class="rounded border-gray-300">
                <label for="actif" class="text-sm text-gray-700">Technicien actif</label>
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="closeAddModal()" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Annuler</button>
                <button type="submit" class="px-6 py-2 signature-gradient text-white rounded-lg font-semibold">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<script>
const techniciensData = {!! $techniciens->map(function($t) {
    return [
        'id'           => $t->id,
        'nom'          => $t->nom,
        'specialite'   => $t->specialite,
        'charge'       => $t->charge ?? 0,
        'interventions'=> $t->interventions->map(function($i) {
            return [
                'titre'       => $i->type_intervention ?? '',
                'description' => $i->description ?? '',
                'date'        => $i->date_heure ? date('H:i', strtotime($i->date_heure)) : 'Non planifiée',
                'lieu'        => $i->client->ville ?? 'Lieu non spécifié',
            ];
        })->toArray(),
    ];
})->toJson() !!};

    function showTechnicianDetails(id) {
        const tech = techniciensData.find(t => t.id === id);
        if (!tech) return;

        document.getElementById('selectedTechnicianName').innerText = tech.nom;
        document.getElementById('selectedTechnicianCount').innerHTML = `${tech.interventions.length} intervention(s) aujourd'hui`;

        const interventionsList = document.getElementById('interventionsList');
        if (tech.interventions.length === 0) {
            interventionsList.innerHTML = '<div class="text-center text-on-surface-variant py-8">Aucune intervention planifiée</div>';
            return;
        }

        interventionsList.innerHTML = tech.interventions.map(intervention => `
            <div class="relative pl-6 before:absolute before:left-0 before:top-1 before:bottom-0 before:w-0.5 before:bg-primary/20">
                <div class="absolute left-[-4px] top-1 w-2.5 h-2.5 rounded-full bg-primary ring-4 ring-white"></div>
                <div class="space-y-2">
                    <div class="flex justify-between items-start">
                        <h5 class="text-sm font-bold text-on-surface">${intervention.titre}</h5>
                        <span class="text-[10px] font-bold bg-primary-container text-on-primary-container px-2 py-0.5 rounded">${intervention.date}</span>
                    </div>
                    <p class="text-xs text-on-surface-variant line-clamp-2">${intervention.description || 'Aucune description'}</p>
                    <div class="flex items-center gap-1 text-[10px] text-on-surface-variant/70 font-medium">
                        <span class="material-symbols-outlined text-xs">location_on</span>
                        ${intervention.lieu}
                    </div>
                </div>
            </div>
        `).join('');
    }

    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
        document.getElementById('addModal').classList.add('flex');
    }
    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
        document.getElementById('addModal').classList.remove('flex');
    }

    // Recherche
    document.getElementById('searchTechnician').addEventListener('keyup', function() {
        let searchTerm = this.value.toLowerCase();
        let cards = document.querySelectorAll('.grid .bg-surface-container-lowest');
        cards.forEach(card => {
            let text = card.innerText.toLowerCase();
            card.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>

</body>
</html>