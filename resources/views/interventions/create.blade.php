<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Nouvelle Intervention - Azure Meridian</title>
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
    </style>
</head>
<body class="bg-surface text-on-surface">

<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-40 bg-[#f9f9ff]/80 backdrop-blur-xl shadow-sm flex justify-between items-center h-16 px-8">
    <div class="flex items-center gap-8 h-full">
        <span class="text-xl font-bold tracking-tighter text-[#191c21]">Azure Meridian</span>
        <div class="hidden md:flex items-center bg-[#f2f3fc] rounded-lg px-3 py-1.5 gap-2 w-64">
            <span class="material-symbols-outlined text-on-surface-variant text-lg">search</span>
            <input class="bg-transparent border-none text-sm focus:ring-0 w-full" placeholder="Rechercher..." type="text">
        </div>
    </div>
    <div class="flex items-center gap-4">
        <div class="h-8 w-8 rounded-full overflow-hidden ml-2 bg-primary flex items-center justify-center text-white text-sm font-bold">
            {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
        </div>
    </div>
</nav>

<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 z-50 bg-[#f2f3fc] flex flex-col p-6 space-y-2 hidden md:flex">
    <div class="flex flex-col mb-8 pt-4">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl signature-gradient flex items-center justify-center text-white">
                <span class="material-symbols-outlined">engineering</span>
            </div>
            <div>
                <h2 class="text-lg font-black text-[#191c21] leading-tight">Azure Meridian</h2>
                <p class="text-xs text-[#424752] font-medium tracking-wide">Gestion d'interventions</p>
            </div>
        </div>
    </div>
    <nav class="flex-1 space-y-1">
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg hover:text-[#003f87] transition-all hover:translate-x-1 duration-300" href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="font-medium text-sm">Tableau de Bord</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg hover:text-[#003f87] transition-all hover:translate-x-1 duration-300" href="{{ route('clients.index') }}">
            <span class="material-symbols-outlined">group</span>
            <span class="font-medium text-sm">Clients</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg transition-all hover:translate-x-1 duration-300" href="{{ route('interventions.index') }}">
            <span class="material-symbols-outlined">engineering</span>
            <span class="font-medium text-sm">Interventions</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg hover:text-[#003f87] transition-all hover:translate-x-1 duration-300" href="{{ route('techniciens.index') }}">
            <span class="material-symbols-outlined">badge</span>
            <span class="font-medium text-sm">Techniciens</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg hover:text-[#003f87] transition-all hover:translate-x-1 duration-300" href="{{ route('rapports.index') }}">
            <span class="material-symbols-outlined">description</span>
            <span class="font-medium text-sm">Rapports</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg hover:text-[#003f87] transition-all hover:translate-x-1 duration-300" href="{{ route('statistiques.index') }}">
            <span class="material-symbols-outlined">monitoring</span>
            <span class="font-medium text-sm">Statistiques</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg hover:text-[#003f87] transition-all hover:translate-x-1 duration-300" href="{{ route('planning.index') }}">
            <span class="material-symbols-outlined">calendar_month</span>
            <span class="font-medium text-sm">Planning</span>
        </a>
    </nav>
    <div class="pt-6 border-t border-outline-variant/10 space-y-1">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg hover:text-error transition-all hover:translate-x-1 duration-300 w-full">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-medium text-sm">Déconnexion</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="md:ml-64 pt-24 pb-12 px-8 min-h-screen">
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 mb-8">
            <span class="text-sm text-on-surface-variant font-medium">Interventions</span>
            <span class="material-symbols-outlined text-sm text-on-surface-variant">chevron_right</span>
            <span class="text-sm text-primary font-semibold">Nouvelle Intervention</span>
        </nav>

        <header class="mb-12">
            <h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2">Créer une Intervention</h1>
            <p class="text-on-surface-variant max-w-2xl leading-relaxed">Remplissez les détails ci-dessous pour planifier et assigner une nouvelle mission technique. Les champs marqués d'une étoile sont obligatoires.</p>
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

        @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form Canvas -->
            <div class="lg:col-span-8 space-y-8">
                <form action="{{ route('interventions.store') }}" method="POST" id="interventionForm">
                    @csrf

                    <!-- Section: Informations Client -->
                    <section class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="w-8 h-8 rounded-lg bg-primary-fixed flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-sm">person</span>
                            </span>
                            <h2 class="text-xl font-bold text-on-surface">Informations Client</h2>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Sélectionner un Client *</label>
                                <div class="relative group">
                                    <select name="client_id" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 text-on-surface focus:ring-1 focus:ring-primary appearance-none transition-all" required>
                                        <option value="">Rechercher un client...</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                                {{ $client->nom_entreprise }} - {{ $client->contact }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">
                                        <span class="material-symbols-outlined">expand_more</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Section: Détails de l'Intervention -->
                    <section class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="w-8 h-8 rounded-lg bg-secondary-container flex items-center justify-center text-on-secondary-container">
                                <span class="material-symbols-outlined text-sm">article</span>
                            </span>
                            <h2 class="text-xl font-bold text-on-surface">Détails de l'Intervention</h2>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Type d'Intervention *</label>
                                <input type="text" name="type_intervention" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 text-on-surface focus:ring-1 focus:ring-primary transition-all" placeholder="Ex: Maintenance Curative, Installation, Audit..." value="{{ old('type_intervention') }}" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Priorité *</label>
                                <div class="grid grid-cols-3 gap-2">
                                    <button type="button" onclick="setPriority('basse')" class="priority-btn flex flex-col items-center justify-center p-3 rounded-xl bg-surface-container-low hover:bg-surface-container border-2 transition-all" data-priority="basse">
                                        <span class="w-2 h-2 rounded-full bg-green-500 mb-1"></span>
                                        <span class="text-[10px] font-bold uppercase tracking-tighter">Basse</span>
                                    </button>
                                    <button type="button" onclick="setPriority('moyenne')" class="priority-btn flex flex-col items-center justify-center p-3 rounded-xl border-2 border-primary-container bg-primary-fixed-dim/20 transition-all active" data-priority="moyenne">
                                        <span class="w-2 h-2 rounded-full bg-primary mb-1"></span>
                                        <span class="text-[10px] font-bold uppercase tracking-tighter text-primary">Moyenne</span>
                                    </button>
                                    <button type="button" onclick="setPriority('haute')" class="priority-btn flex flex-col items-center justify-center p-3 rounded-xl bg-surface-container-low hover:bg-surface-container border-2 transition-all" data-priority="haute">
                                        <span class="w-2 h-2 rounded-full bg-error mb-1"></span>
                                        <span class="text-[10px] font-bold uppercase tracking-tighter">Haute</span>
                                    </button>
                                </div>
                                <input type="hidden" name="priorite" id="priorite" value="moyenne">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Description de la mission *</label>
                                <textarea name="description" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 text-on-surface focus:ring-1 focus:ring-primary transition-all resize-none" placeholder="Décrivez précisément l'intervention à réaliser..." rows="4" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </section>

                    <!-- Section: Attribution & Planification -->
                    <section class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="w-8 h-8 rounded-lg bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
                                <span class="material-symbols-outlined text-sm">calendar_month</span>
                            </span>
                            <h2 class="text-xl font-bold text-on-surface">Attribution &amp; Planification</h2>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Technicien Référent</label>
                                <div class="relative">
                                    <select name="technicien_id" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 text-on-surface focus:ring-1 focus:ring-primary appearance-none transition-all">
                                        <option value="">Assigner un technicien</option>
                                        @foreach($techniciens as $technicien)
                                            <option value="{{ $technicien->id }}" {{ old('technicien_id') == $technicien->id ? 'selected' : '' }}>
                                                {{ $technicien->nom }} ({{ $technicien->specialite ?? 'Polyvalent' }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">
                                        <span class="material-symbols-outlined">engineering</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Date de l'intervention</label>
                                    <input type="date" name="date_heure" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 text-on-surface focus:ring-1 focus:ring-primary transition-all" value="{{ old('date_heure') }}">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-2">Heure prévue</label>
                                    <input type="time" name="heure" class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 text-on-surface focus:ring-1 focus:ring-primary transition-all" value="{{ old('heure') }}">
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>

            <!-- Sidebar Actions/Info -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-surface-container-high/50 p-6 rounded-xl border border-outline-variant/20 sticky top-24">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-on-surface-variant mb-6">Résumé de l'Intervention</h3>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-start gap-4">
                            <span class="text-xs font-medium text-on-surface-variant">Client</span>
                            <span class="text-xs font-bold text-on-surface text-right" id="summaryClient">Non sélectionné</span>
                        </div>
                        <div class="flex justify-between items-start gap-4">
                            <span class="text-xs font-medium text-on-surface-variant">Type</span>
                            <span class="text-xs font-bold text-on-surface text-right" id="summaryType">—</span>
                        </div>
                        <div class="flex justify-between items-start gap-4">
                            <span class="text-xs font-medium text-on-surface-variant">Priorité</span>
                            <span class="text-xs font-bold text-primary text-right" id="summaryPriorite">Moyenne</span>
                        </div>
                        <div class="flex justify-between items-start gap-4">
                            <span class="text-xs font-medium text-on-surface-variant">Technicien</span>
                            <span class="text-xs font-bold text-on-surface text-right" id="summaryTechnicien">Non assigné</span>
                        </div>
                    </div>
                    <button type="submit" form="interventionForm" class="w-full signature-gradient text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl active:scale-95 transition-all mb-3 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">add</span>
                        Créer Intervention
                    </button>
                    <a href="{{ route('interventions.index') }}" class="w-full bg-surface-container-highest/50 text-on-surface-variant font-bold py-3 rounded-xl hover:bg-surface-container-highest transition-all flex items-center justify-center gap-2 block text-center">
                        <span class="material-symbols-outlined text-sm">close</span>
                        Annuler
                    </a>
                    <div class="mt-8 pt-8 border-t border-outline-variant/20">
                        <div class="flex items-center gap-2 text-primary mb-3">
                            <span class="material-symbols-outlined text-sm">info</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest">Conseil Azure</span>
                        </div>
                        <p class="text-[11px] text-on-surface-variant leading-relaxed">
                            N'oubliez pas de joindre les schémas techniques ou photos nécessaires après la création de l'intervention.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function setPriority(priority) {
        document.getElementById('priorite').value = priority;
        const labels = { basse: 'Basse', moyenne: 'Moyenne', haute: 'Haute' };
        document.getElementById('summaryPriorite').innerText = labels[priority];
        
        document.querySelectorAll('.priority-btn').forEach(btn => {
            btn.classList.remove('border-2', 'border-primary-container', 'bg-primary-fixed-dim/20');
            btn.classList.add('bg-surface-container-low');
        });
        event.currentTarget.classList.add('border-2', 'border-primary-container', 'bg-primary-fixed-dim/20');
        event.currentTarget.classList.remove('bg-surface-container-low');
    }

    // Mise à jour du résumé
    document.querySelector('select[name="client_id"]').addEventListener('change', function() {
        let option = this.options[this.selectedIndex];
        document.getElementById('summaryClient').innerText = option.text || 'Non sélectionné';
    });

    document.querySelector('input[name="type_intervention"]').addEventListener('input', function() {
        document.getElementById('summaryType').innerText = this.value || '—';
    });

    document.querySelector('select[name="technicien_id"]').addEventListener('change', function() {
        let option = this.options[this.selectedIndex];
        document.getElementById('summaryTechnicien').innerText = option.text || 'Non assigné';
    });
</script>

</body>
</html>