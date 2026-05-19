<!DOCTYPE html>
<html class="h-full bg-slate-50" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Rapport d'intervention - Azure Meridian</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'azure-primary': '#2563eb',
                        'azure-accent': '#eff6ff',
                        'azure-success': '#22c55e',
                        'sidebar-text': '#64748b'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="h-full flex">

<main class="flex-1 flex flex-col min-w-0 overflow-hidden">
    <!-- Top Navigation Bar -->
    <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 gap-4">
        <div class="flex items-center gap-4">
            <h1 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                <span class="w-8 h-8 bg-azure-primary rounded-lg flex items-center justify-center text-white text-xs">YA</span>
                Gestion interventions
            </h1>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-xs font-semibold text-slate-700 leading-none">{{ Auth::user()->name ?? 'Administrateur' }}</p>
                    <p class="text-[10px] text-slate-400 leading-tight">{{ Auth::user()->role ?? 'Admin System' }}</p>
                </div>
                <div class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center text-azure-primary font-bold text-xs border border-slate-200">
                    {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
                </div>
            </div>
        </div>
    </header>

    <!-- Scrollable Content -->
    <div class="flex-1 overflow-y-auto p-8">
        <!-- Content Header -->
        <section class="flex justify-between items-start mb-8">
            <div>
                <h2 class="text-3xl font-bold text-slate-800">Rapport d'intervention</h2>
                <p class="text-slate-500 mt-1 font-medium">Intervention #{{ $rapport->intervention->numero }}</p>
            </div>
            <a href="{{ route('interventions.show', $rapport->intervention_id) }}" class="flex items-center text-slate-600 hover:text-slate-900 font-medium transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                Retour
            </a>
        </section>

        <div class="grid grid-cols-12 gap-8">
            <!-- Left Column: Report Details -->
            <div class="col-span-12 lg:col-span-8 space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div class="flex items-center text-slate-700 font-medium text-sm">
                            <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                            Détail du rapport
                        </div>
                        @if($rapport->valide)
                        <a href="{{ route('export.rapport', $rapport) }}" class="bg-azure-primary text-white text-xs font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                            Exporter en PDF
                        </a>
                        @endif
                    </div>
                    <div class="p-8 space-y-8">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Description de l'intervention</h3>
                            <p class="text-slate-600">{{ $rapport->description ?: 'Aucune description' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Actions réalisées</h3>
                            <p class="text-slate-600">{{ $rapport->actions_realisees ?: 'Aucune action renseignée' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Pièces utilisées</h3>
                            <p class="text-slate-600 italic">{{ $rapport->pieces_utilisees ?: 'Aucune pièce utilisée' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Durée</h3>
                            <p class="text-slate-600 font-medium">{{ $rapport->duree_minutes }} minutes ({{ floor($rapport->duree_minutes / 60) }}h {{ $rapport->duree_minutes % 60 }}min)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Status & Client Info -->
            <div class="col-span-12 lg:col-span-4 space-y-6">
                <!-- Status Card -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex items-center bg-slate-50/50">
                        <div class="w-5 h-5 bg-azure-success/10 rounded flex items-center justify-center mr-2">
                            <svg class="w-3 h-3 text-azure-success" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" fill-rule="evenodd"></path></svg>
                        </div>
                        <span class="text-slate-700 font-medium text-sm">Statut</span>
                    </div>
                    <div class="p-10 flex flex-col items-center justify-center text-center">
                        @if($rapport->valide)
                            <div class="w-16 h-16 bg-azure-success rounded-full flex items-center justify-center text-white mb-4 shadow-lg shadow-green-100">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path></svg>
                            </div>
                            <h4 class="text-2xl font-bold text-slate-800">Rapport validé</h4>
                            <div class="mt-2 text-sm text-slate-500">
                                <p>Validé par <span class="font-semibold text-slate-700">{{ $rapport->validateur->name ?? 'Manager' }}</span></p>
                                <p>le {{ $rapport->date_validation ? date('d/m/Y H:i', strtotime($rapport->date_validation)) : '-' }}</p>
                            </div>
                        @else
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 mb-4 shadow-lg shadow-orange-100">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                            </div>
                            <h4 class="text-2xl font-bold text-slate-800">En attente de validation</h4>
                            <div class="mt-2 text-sm text-slate-500">
                                <p>Soumis le {{ $rapport->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                            <form action="{{ route('rapports.valider', $rapport) }}" method="POST" class="mt-4">
                                @csrf
                                <button type="submit" class="bg-azure-primary text-white px-6 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">
                                    Valider le rapport
                                </button>
                            </form>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Client Card -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex items-center bg-slate-50/50">
                        <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        <span class="text-slate-700 font-medium text-sm">Informations client</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <h4 class="text-lg font-bold text-slate-800">{{ $rapport->intervention->client->nom_entreprise ?? 'N/A' }}</h4>
                        <div class="space-y-3">
                            <div class="flex items-start text-sm">
                                <span class="text-slate-500 w-24 flex-shrink-0">Contact :</span>
                                <span class="text-slate-800 font-medium">{{ $rapport->intervention->client->contact ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-start text-sm">
                                <span class="text-slate-500 w-24 flex-shrink-0">Tél :</span>
                                <span class="text-slate-800 font-medium">{{ $rapport->intervention->client->telephone ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-start text-sm">
                                <span class="text-slate-500 w-24 flex-shrink-0">Adresse :</span>
                                <span class="text-slate-800 font-medium">{{ $rapport->intervention->client->adresse ?? 'Non renseignée' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>