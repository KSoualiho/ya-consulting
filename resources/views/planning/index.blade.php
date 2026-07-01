<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YA Consulting - Planning Hebdomadaire</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "secondary-fixed": "#d7e2ff",
                        "error-container": "#ffdad6",
                        "on-primary-fixed": "#001a40",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "on-background": "#191c21",
                        "on-secondary-container": "#475a7f",
                        "primary-fixed": "#d7e2ff",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed-dim": "#b3c7f1",
                        "error": "#ba1a1a",
                        "surface-tint": "#115cb9",
                        "surface-dim": "#d9d9e2",
                        "on-secondary": "#ffffff",
                        "tertiary-container": "#983c00",
                        "on-error": "#ffffff",
                        "secondary-container": "#bfd2fd",
                        "tertiary": "#722b00",
                        "surface-container": "#ededf6",
                        "on-tertiary-fixed": "#351000",
                        "on-tertiary-container": "#ffc2a7",
                        "on-primary-fixed-variant": "#004491",
                        "primary": "#003f87",
                        "inverse-on-surface": "#f0f0f9",
                        "outline": "#727784",
                        "primary-container": "#0056b3",
                        "background": "#f9f9ff",
                        "surface-container-low": "#f2f3fc",
                        "surface-container-high": "#e7e8f0",
                        "on-secondary-fixed-variant": "#34476a",
                        "inverse-primary": "#acc7ff",
                        "tertiary-fixed-dim": "#ffb694",
                        "on-secondary-fixed": "#041b3c",
                        "surface-container-highest": "#e1e2ea",
                        "tertiary-fixed": "#ffdbcc",
                        "surface": "#f9f9ff",
                        "secondary": "#4c5e84",
                        "inverse-surface": "#2e3037",
                        "on-surface-variant": "#424752",
                        "surface-variant": "#e1e2ea",
                        "primary-fixed-dim": "#acc7ff",
                        "on-primary": "#ffffff",
                        "outline-variant": "#c2c6d4",
                        "on-surface": "#191c21",
                        "surface-bright": "#f9f9ff",
                        "on-error-container": "#93000a",
                        "on-primary-container": "#bbd0ff",
                        "surface-container-lowest": "#ffffff"
                    },
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
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
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .signature-gradient {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 100%);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c2c6d4;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-background text-on-surface antialiased flex overflow-hidden">
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
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('rapports.index') }}">
            <span class="material-symbols-outlined">description</span>
            <span>Rapports</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('statistiques.index') }}">
            <span class="material-symbols-outlined">monitoring</span>
            <span>Statistiques</span>
        </a>
       <a class="flex items-center gap-3 px-4 py-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg transition-all duration-200" href="{{ route('planning.index') }}">
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
<main class="ml-64 flex-1 h-screen overflow-hidden flex flex-col">
    <!-- TopAppBar -->
    <header class="bg-[#f9f9ff]/80 backdrop-blur-md sticky top-0 z-20 flex justify-between items-center w-full px-8 py-4 shadow-[0_8px_40px_rgba(25,28,33,0.06)]">
        <div class="flex items-center gap-8">
            <span class="text-xl font-black text-[#001d3d] tracking-tighter">Meridian Planner</span>
            <nav class="hidden md:flex gap-6 items-center">
                <a href="{{ route('planning.index') }}" class="text-[#0056b3] font-bold border-b-2 border-[#0056b3] pb-1">Calendrier</a>
                <a href="{{ route('interventions.index') }}" class="text-[#424752] font-medium hover:text-[#0056b3] transition-colors">Interventions</a>
                <a href="{{ route('techniciens.index') }}" class="text-[#424752] font-medium hover:text-[#0056b3] transition-colors">Équipes</a>
                <a href="{{ route('rapports.index') }}" class="text-[#424752] font-medium hover:text-[#0056b3] transition-colors">Rapports</a>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('interventions.create') }}" class="signature-gradient text-white px-6 py-2.5 rounded-lg text-sm font-semibold shadow-md active:scale-95 transition-transform">
                Nouvelle Intervention
            </a>
            <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
            </div>
        </div>
    </header>

    <!-- Planning Content -->
    <div class="flex-1 overflow-y-auto p-8 bg-surface custom-scrollbar">
        <!-- Page Header -->
        <div class="grid grid-cols-12 gap-6 mb-8">
            <div class="col-span-12 lg:col-span-4 flex flex-col justify-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-on-surface mb-2">Planning Hebdomadaire</h2>
                <div class="flex items-center gap-3 bg-surface-container-low px-4 py-2 rounded-xl w-fit">
                    <button onclick="previousWeek()" class="material-symbols-outlined text-primary hover:bg-white rounded-lg p-1 transition-colors">chevron_left</button>
                    <span class="font-bold text-sm" id="weekRange">15 — 21 Mai 2024</span>
                    <button onclick="nextWeek()" class="material-symbols-outlined text-primary hover:bg-white rounded-lg p-1 transition-colors">chevron_right</button>
                </div>
            </div>
            <div class="col-span-6 lg:col-span-4 bg-surface-container-lowest p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant/60 mb-1">Taux d'occupation global</p>
                    <h3 class="text-2xl font-black text-primary">{{ $tauxOccupation ?? 87.5 }}%</h3>
                </div>
                <div class="h-16 w-16 relative">
                    <svg class="h-full w-full" viewBox="0 0 36 36">
                        <path class="text-surface-container stroke-current" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke-width="3"></path>
                        <path class="text-primary stroke-current" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke-dasharray="{{ $tauxOccupation ?? 87.5 }}, 100" stroke-linecap="round" stroke-width="3"></path>
                    </svg>
                </div>
            </div>
            <div class="col-span-6 lg:col-span-4 bg-surface-container-lowest p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] flex flex-col justify-center">
                <p class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant/60 mb-3">Légende de Priorité</p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-error"></span>
                        <span class="text-xs font-semibold">Urgente</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-tertiary"></span>
                        <span class="text-xs font-semibold">Haute</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-primary-container"></span>
                        <span class="text-xs font-semibold">Moyenne</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar View -->
<div class="bg-surface-container-lowest rounded-2xl shadow-[0_8px_40px_rgba(0,0,0,0.04)] overflow-hidden">
    <!-- Day Headers -->
    <div class="grid grid-cols-7 border-b border-outline-variant/10" id="dayHeaders"></div>
    <!-- Calendar Content -->
    <div class="grid grid-cols-7 min-h-[600px]" id="calendarGrid"></div>
</div>

<script>
    // Données des interventions depuis Laravel
    const interventions = @json($events);
    
    // Fonction pour obtenir le jour de la semaine (0 = lundi, 6 = dimanche)
    function getWeekDay(dateStr) {
        const date = new Date(dateStr);
        let day = date.getDay();
        return day === 0 ? 6 : day - 1; // Convertir pour que lundi = 0
    }
    
    // Fonction pour formater l'heure
    function getHour(dateStr) {
        const date = new Date(dateStr);
        return date.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
    }
    
    // Grouper les interventions par jour de la semaine (avec vérification de la semaine actuelle)
    function groupInterventionsByDay() {
        const { monday, sunday } = getWeekDates(currentDate);
        const grouped = { 0: [], 1: [], 2: [], 3: [], 4: [], 5: [], 6: [] };
        
        interventions.forEach(intervention => {
            if (intervention.start) {
                const interventionDate = new Date(intervention.start);
                
                // Vérifier que l'intervention est dans la semaine affichée
                if (interventionDate >= monday && interventionDate <= sunday) {
                    const dayIndex = getWeekDay(intervention.start);
                    grouped[dayIndex].push(intervention);
                }
            }
        });
        
        // Trier par heure
        for (let i = 0; i < 7; i++) {
            grouped[i].sort((a, b) => new Date(a.start) - new Date(b.start));
        }
        
        return grouped;
    }
    
    // Obtenir la couleur de fond selon la priorité
    function getPriorityColor(priorite) {
        switch(priorite) {
            case 'urgente': return 'bg-error/10 border-l-4 border-error';
            case 'haute': return 'bg-tertiary/10 border-l-4 border-tertiary';
            case 'moyenne': return 'bg-primary-container/10 border-l-4 border-primary-container';
            default: return 'bg-surface-container border-l-4 border-outline-variant';
        }
    }
    
    // Obtenir la couleur du texte de priorité
    function getPriorityTextColor(priorite) {
        switch(priorite) {
            case 'urgente': return 'text-error';
            case 'haute': return 'text-tertiary';
            case 'moyenne': return 'text-primary-container';
            default: return 'text-on-surface-variant';
        }
    }
    
    const joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    const mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    
    // Obtenir la semaine actuelle
    let currentDate = new Date();
    
    function getWeekDates(date) {
        const current = new Date(date);
        const day = current.getDay();
        const diff = current.getDate() - day + (day === 0 ? -6 : 1);
        const monday = new Date(current.setDate(diff));
        const sunday = new Date(current.setDate(diff + 6));
        return { monday, sunday };
    }
    
    function formatDateRange(monday, sunday) {
        const startDay = monday.getDate();
        const endDay = sunday.getDate();
        const startMonth = mois[monday.getMonth()];
        const endMonth = mois[sunday.getMonth()];
        
        if (startMonth === endMonth) {
            return `${startDay} — ${endDay} ${startMonth} ${monday.getFullYear()}`;
        } else {
            return `${startDay} ${startMonth} — ${endDay} ${endMonth} ${monday.getFullYear()}`;
        }
    }
    
    function renderCalendar() {
        const { monday, sunday } = getWeekDates(currentDate);
        
        // Mettre à jour l'affichage de la semaine
        document.getElementById('weekRange').innerText = formatDateRange(monday, sunday);
        
        const groupedInterventions = groupInterventionsByDay();
        
        // Rendu des en-têtes
        const dayHeaders = document.getElementById('dayHeaders');
        const today = new Date();
        const todayDayIndex = getWeekDay(today);
        const currentDayIndex = getWeekDay(monday);
        
        dayHeaders.innerHTML = joursSemaine.map((jour, index) => {
            const date = new Date(monday);
            date.setDate(monday.getDate() + index);
            const isToday = date.toDateString() === today.toDateString();
            
            return `
                <div class="p-6 text-center border-r border-outline-variant/10 ${isToday ? 'bg-primary/5' : ''}">
                    <p class="text-[10px] font-bold ${isToday ? 'text-primary' : 'text-on-surface-variant/50'} uppercase">${jour}</p>
                    <p class="text-xl font-black ${isToday ? 'text-primary' : ''}">${date.getDate()}</p>
                </div>
            `;
        }).join('');
        
        // Rendu du contenu
        const calendarGrid = document.getElementById('calendarGrid');
        calendarGrid.innerHTML = joursSemaine.map((jour, index) => {
            const interventionsOfDay = groupedInterventions[index];
            const date = new Date(monday);
            date.setDate(monday.getDate() + index);
            const isToday = date.toDateString() === today.toDateString();
            
            let interventionsHtml = '';
            if (interventionsOfDay.length > 0) {
                interventionsHtml = interventionsOfDay.map(intervention => {
                    const startTime = getHour(intervention.start);
                    const endTime = getHour(new Date(new Date(intervention.start).getTime() + 2 * 60 * 60 * 1000));
                    const priorityClass = getPriorityColor(intervention.extendedProps?.priorite);
                    const priorityTextClass = getPriorityTextColor(intervention.extendedProps?.priorite);
                    
                    return `
                        <div class="${priorityClass} p-3 rounded-r-lg cursor-pointer hover:opacity-80 transition-opacity" onclick="window.location.href='/interventions/${intervention.id}'">
                            <p class="text-[10px] font-bold ${priorityTextClass}">${startTime} - ${endTime}</p>
                            <h4 class="text-xs font-bold mt-1">${intervention.title.split(' - ')[0]}</h4>
                            <p class="text-[9px] text-on-surface-variant mt-1">Client: ${intervention.extendedProps?.client || 'N/A'}</p>
                            <p class="text-[9px] text-on-surface-variant">Technicien: ${intervention.extendedProps?.technicien || 'Non assigné'}</p>
                        </div>
                    `;
                }).join('');
            } else {
                interventionsHtml = `
                    <div class="border border-dashed border-outline-variant/30 rounded-lg p-6 flex flex-col items-center justify-center opacity-40">
                        <span class="material-symbols-outlined text-lg mb-2">event</span>
                        <p class="text-[10px] font-medium">Aucune intervention</p>
                    </div>
                `;
            }
            
            return `
                <div class="border-r border-outline-variant/10 p-4 space-y-4 min-h-[500px] ${isToday ? 'bg-primary/5' : ''}">
                    ${interventionsHtml}
                </div>
            `;
        }).join('');
    }
    
    function previousWeek() {
        currentDate.setDate(currentDate.getDate() - 7);
        renderCalendar();
    }
    
    function nextWeek() {
        currentDate.setDate(currentDate.getDate() + 7);
        renderCalendar();
    }
    
    // Initialisation
    renderCalendar();
</script>
    </div>
</main>

<!-- Floating Action Button -->
<a href="{{ route('interventions.create') }}" class="fixed bottom-10 right-10 signature-gradient h-16 w-16 rounded-full flex items-center justify-center text-white shadow-2xl hover:scale-110 active:scale-95 transition-all z-40 group">
    <span class="material-symbols-outlined text-3xl">add</span>
    <span class="absolute right-full mr-4 bg-on-surface text-white text-xs px-3 py-1.5 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">Programmer une intervention</span>
</a>

<script>
    // Données des interventions
    const interventions = @json($events ?? []);

    const joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    function renderCalendar() {
        const dayHeaders = document.getElementById('dayHeaders');
        const calendarGrid = document.getElementById('calendarGrid');
        
        // Rendu simplifié - à compléter selon vos besoins
        dayHeaders.innerHTML = joursSemaine.map(jour => `
            <div class="p-6 text-center border-r border-outline-variant/10">
                <p class="text-[10px] font-bold text-on-surface-variant/50 uppercase">${jour}</p>
                <p class="text-xl font-black">${Math.floor(Math.random() * 30) + 1}</p>
            </div>
        `).join('');
        
        calendarGrid.innerHTML = joursSemaine.map(() => `
            <div class="border-r border-outline-variant/10 p-4 space-y-4 min-h-[400px]">
                <div class="border border-dashed border-outline-variant/30 rounded-lg p-6 flex flex-col items-center justify-center opacity-40">
                    <span class="material-symbols-outlined text-lg mb-2">event</span>
                    <p class="text-[10px] font-medium">Aucune intervention</p>
                </div>
            </div>
        `).join('');
    }

    function previousWeek() {
        // Navigation semaine précédente
    }

    function nextWeek() {
        // Navigation semaine suivante
    }

    renderCalendar();
</script>

</body>
</html>