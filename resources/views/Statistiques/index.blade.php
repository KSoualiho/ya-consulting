<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Statistiques et Analytique | YA Consulting</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .glass-effect { backdrop-filter: blur(20px); }
    </style>
</head>
<body class="bg-background text-on-surface">

<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 z-50 bg-[#f2f3fc] flex flex-col p-6 space-y-2">
    <div class="flex items-center space-x-3 mb-10 px-2">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003f87] to-[#0056b3] flex items-center justify-center shadow-md">
            <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">architecture</span>
        </div>
        <div>
            <h1 class="text-lg font-black text-[#191c21] leading-tight">YA Consulting</h1>
            <p class="text-[10px] uppercase tracking-[0.1em] text-on-surface-variant/60 font-bold">Gestion d'interventions</p>
        </div>
    </div>
    
    <nav class="flex-1 space-y-1">
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] transition-all font-medium text-sm tracking-wide rounded-lg group" href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Tableau de Bord</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] transition-all font-medium text-sm tracking-wide rounded-lg" href="{{ route('clients.index') }}">
            <span class="material-symbols-outlined">group</span>
            <span>Clients</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] transition-all font-medium text-sm tracking-wide rounded-lg" href="{{ route('interventions.index') }}">
            <span class="material-symbols-outlined">engineering</span>
            <span>Interventions</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] transition-all font-medium text-sm tracking-wide rounded-lg" href="{{ route('techniciens.index') }}">
            <span class="material-symbols-outlined">badge</span>
            <span>Techniciens</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] transition-all font-medium text-sm tracking-wide rounded-lg" href="{{ route('rapports.index') }}">
            <span class="material-symbols-outlined">description</span>
            <span>Rapports</span>
        </a>
        <a class="flex items-center space-x-3 p-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg font-medium text-sm tracking-wide transform translate-x-1 duration-300" href="{{ route('statistiques.index') }}">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">monitoring</span>
            <span>Statistiques</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] transition-all font-medium text-sm tracking-wide rounded-lg" href="{{ route('planning.index') }}">
            <span class="material-symbols-outlined">calendar_month</span>
            <span>Planning</span>
        </a>
    </nav>
    
    <div class="pt-6 mt-6 border-t border-on-surface/5 flex flex-col space-y-1">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center space-x-3 p-3 text-error/80 hover:bg-error-container/20 transition-all font-medium text-sm tracking-wide rounded-lg w-full">
                <span class="material-symbols-outlined">logout</span>
                <span>Déconnexion</span>
            </button>
        </form>
    </div>
</aside>

<!-- TopNavBar -->
<header class="fixed top-0 right-0 left-64 z-40 bg-[#f9f9ff]/80 backdrop-blur-xl h-16 px-8 flex justify-between items-center shadow-sm">
    <div class="flex items-center w-96 bg-[#f2f3fc] rounded-full px-4 py-2 group focus-within:ring-1 ring-[#003f87]/30 transition-all">
        <span class="material-symbols-outlined text-on-surface-variant mr-2 text-sm">search</span>
        <input id="searchStats" class="bg-transparent border-none focus:ring-0 text-sm w-full placeholder-[#424752]/50" placeholder="Rechercher une analyse..." type="text">
    </div>
    <div class="flex items-center space-x-4">
        <div class="flex items-center space-x-3 group cursor-pointer">
            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'AV', 0, 1) }}
            </div>
            <div class="text-right hidden md:block">
                <p class="text-xs font-bold text-on-surface">{{ Auth::user()->name ?? 'Alexandre V.' }}</p>
                <p class="text-[10px] text-on-surface-variant/70">{{ Auth::user()->role ?? 'Administrateur' }}</p>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="ml-64 pt-24 p-8 min-h-screen">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
        <div>
            <span class="text-[10px] font-bold tracking-[0.15em] text-primary uppercase mb-1 block">Rapports de performance</span>
            <h2 class="text-3xl font-bold tracking-tight text-on-surface">Statistiques &amp; Analytique</h2>
            <p class="text-on-surface-variant mt-1 text-sm max-w-md">Vue d'ensemble de l'efficacité opérationnelle et de la satisfaction client pour la période en cours.</p>
        </div>
        <div class="flex items-center space-x-3 bg-surface-container-low p-2 rounded-xl">
            <div class="flex items-center px-4 py-2 bg-surface-container-lowest rounded-lg shadow-sm">
                <span class="material-symbols-outlined text-sm mr-2 text-primary">calendar_today</span>
                <select id="periodFilter" class="bg-transparent border-none focus:ring-0 text-xs font-medium py-0">
                    <option value="30">Derniers 30 jours</option>
                    <option value="90">Dernier trimestre</option>
                    <option value="365">Année 2024</option>
                </select>
            </div>
            <div class="flex items-center px-4 py-2 bg-surface-container-lowest rounded-lg shadow-sm">
                <span class="material-symbols-outlined text-sm mr-2 text-primary">engineering</span>
                <select id="technicianFilter" class="bg-transparent border-none focus:ring-0 text-xs font-medium py-0">
                    <option value="">Tous les techniciens</option>
                    @foreach($topTechniciens ?? [] as $tech)
                        <option value="{{ $tech->id }}">{{ $tech->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button onclick="refreshStats()" class="p-2 bg-primary text-white rounded-lg hover:shadow-lg active:scale-95 transition-all">
                <span class="material-symbols-outlined text-sm">filter_list</span>
            </button>
        </div>
    </div>

    <!-- KPI Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">assignment_turned_in</span>
                </div>
                <span class="text-xs font-bold text-emerald-600 flex items-center">
                    <span class="material-symbols-outlined text-sm mr-1">trending_up</span> +12%
                </span>
            </div>
            <div class="mt-4">
                <p class="text-3xl font-black text-on-surface tracking-tighter">{{ $totalInterventions ?? 0 }}</p>
                <h3 class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-wider">Total Interventions</h3>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-lg bg-tertiary-fixed/30 flex items-center justify-center text-tertiary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">schedule</span>
                </div>
                <span class="text-xs font-bold text-error flex items-center">
                    <span class="material-symbols-outlined text-sm mr-1">trending_down</span> -4%
                </span>
            </div>
            <div class="mt-4">
                <p class="text-3xl font-black text-on-surface tracking-tighter">{{ round($tempsMoyen ?? 42) }}m</p>
                <h3 class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-wider">Temps Moyen</h3>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-lg bg-secondary-container/30 flex items-center justify-center text-on-secondary-container">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <span class="text-xs font-bold text-emerald-600 flex items-center">
                    <span class="material-symbols-outlined text-sm mr-1">trending_up</span> +2%
                </span>
            </div>
            <div class="mt-4">
                <p class="text-3xl font-black text-on-surface tracking-tighter">{{ number_format($satisfactionMoyenne ?? 4.8, 1) }}/5</p>
                <h3 class="text-xs font-bold text-on-surface-variant/60 uppercase tracking-wider">Satisfaction Client</h3>
            </div>
        </div>
        <div class="bg-gradient-to-br from-primary to-primary-container p-6 rounded-xl shadow-lg text-white relative overflow-hidden group">
            <div class="absolute -right-6 -bottom-6 opacity-10 group-hover:scale-110 transition-transform duration-500">
                <span class="material-symbols-outlined text-[120px]">insights</span>
            </div>
            <div class="z-10">
                <p class="text-xs font-bold uppercase tracking-widest opacity-80 mb-1">Objectif Mensuel</p>
                <p class="text-2xl font-black tracking-tight">{{ $tauxReussite ?? 85 }}% atteint</p>
            </div>
            <div class="mt-4 z-10">
                <div class="w-full bg-white/20 h-2 rounded-full overflow-hidden">
                    <div class="bg-white h-full rounded-full w-[{{ $tauxReussite ?? 85 }}%]"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Performance Techniciens -->
        <div class="lg:col-span-8 bg-surface-container-lowest rounded-2xl p-8 shadow-[0_8px_40px_rgb(0,0,0,0.02)]">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h3 class="text-lg font-bold text-on-surface">Performance des Techniciens</h3>
                    <p class="text-xs text-on-surface-variant">Volume d'interventions complétées par membre de l'équipe</p>
                </div>
                <a href="{{ route('techniciens.index') }}" class="text-primary text-xs font-bold hover:underline flex items-center">
                    Voir tout <span class="material-symbols-outlined text-sm ml-1">chevron_right</span>
                </a>
            </div>
            <div class="space-y-6">
                @foreach($topTechniciens ?? [] as $technicien)
                <div class="grid grid-cols-[120px_1fr_40px] items-center gap-4 group">
                    <span class="text-xs font-semibold text-on-surface-variant">{{ $technicien->nom }}</span>
                    <div class="h-8 bg-surface-container-low rounded-md overflow-hidden relative">
                       @php
    $maxCount = $topTechniciens->first()->interventions_count ?? 1;
    $maxCount = $maxCount > 0 ? $maxCount : 1;
    $percentage = min(($technicien->interventions_count / $maxCount) * 100, 100);
@endphp
                        <div class="absolute left-0 top-0 h-full bg-gradient-to-r from-primary/80 to-primary w-[{{ $percentage }}%] transition-all duration-1000"></div>
                    </div>
                    <span class="text-xs font-bold text-on-surface text-right">{{ $technicien->interventions_count }}</span>
                </div>
                @endforeach
            </div>
            <div class="mt-12 pt-6 border-t border-on-surface/5 flex justify-center space-x-8">
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-primary"></span>
                    <span class="text-[10px] font-bold uppercase text-on-surface-variant/70">Objectif Atteint</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="w-3 h-3 rounded-full bg-surface-container-low"></span>
                    <span class="text-[10px] font-bold uppercase text-on-surface-variant/70">Moyenne Équipe</span>
                </div>
            </div>
        </div>

        <!-- Statuts Distribution -->
        <div class="lg:col-span-4 bg-surface-container rounded-2xl p-8 relative overflow-hidden">
            <h3 class="text-lg font-bold text-on-surface mb-2">Répartition par Statut</h3>
            <p class="text-xs text-on-surface-variant mb-6">État actuel de toutes les missions en cours</p>
            <canvas id="statusChart" height="200"></canvas>
            <div class="mt-6 space-y-3">
                <div class="flex items-center justify-between p-3 bg-surface-container-lowest rounded-xl">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-primary mr-3"></div>
                        <span class="text-xs font-semibold text-on-surface">Terminées</span>
                    </div>
                    <span class="text-xs font-bold text-on-surface">{{ $statuts['terminee'] ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-surface-container-lowest rounded-xl">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-secondary mr-3"></div>
                        <span class="text-xs font-semibold text-on-surface">En Cours</span>
                    </div>
                    <span class="text-xs font-bold text-on-surface">{{ $statuts['en_cours'] ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-surface-container-lowest rounded-xl">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-tertiary mr-3"></div>
                        <span class="text-xs font-semibold text-on-surface">Planifiées</span>
                    </div>
                    <span class="text-xs font-bold text-on-surface">{{ $statuts['planifiee'] ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-surface-container-lowest rounded-xl">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-error mr-3"></div>
                        <span class="text-xs font-semibold text-on-surface">Annulées</span>
                    </div>
                    <span class="text-xs font-bold text-on-surface">{{ $statuts['annulee'] ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique évolution mensuelle -->
    <div class="mt-8 bg-surface-container-lowest rounded-2xl p-8 shadow-[0_8px_40px_rgb(0,0,0,0.02)]">
        <h3 class="text-lg font-bold text-on-surface mb-6">Évolution mensuelle</h3>
        <canvas id="monthlyChart" height="300"></canvas>
    </div>
</main>

<script>
    // Graphique des statuts
    const ctx1 = document.getElementById('statusChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Terminées', 'En cours', 'Planifiées', 'En attente', 'Annulées'],
            datasets: [{
                data: [
                    {{ $statuts['terminee'] ?? 0 }},
                    {{ $statuts['en_cours'] ?? 0 }},
                    {{ $statuts['planifiee'] ?? 0 }},
                    {{ $statuts['en_attente'] ?? 0 }},
                    {{ $statuts['annulee'] ?? 0 }}
                ],
                backgroundColor: ['#003f87', '#4c5e84', '#983c00', '#c2c6d4', '#ba1a1a']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Graphique évolution mensuelle
const ctx2 = document.getElementById('monthlyChart').getContext('2d');
new Chart(ctx2, {
    type: 'line',
    data: { )
       labels: {!! json_encode($moisLabels ?? ['Jan','Fev','Mar','Avr','Mai','Jun','Jul','Aou','Sep','Oct','Nov','Dec']) !!},
        datasets: [{
            label: 'Interventions',
            data: {!! json_encode($moisData ?? array_fill(0, 12, 0)) !!},
            borderColor: '#003f87',
            backgroundColor: 'rgba(0, 63, 135, 0.1)',
            tension: 0.3,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: { position: 'top' }
        }
    }
});
    function refreshStats() {
        let period = document.getElementById('periodFilter').value;
        let technician = document.getElementById('technicianFilter').value;
        window.location.href = '{{ route("statistiques.index") }}?period=' + period + '&technician=' + technician;
    }
</script>

</body>
</html>