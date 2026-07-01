<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Nouvelle Intervention - Azure Meridian</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8f9ff; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .signature-gradient { background: linear-gradient(135deg, #003f87 0%, #0056b3 100%); }
        .card-shadow { box-shadow: 0 4px 20px rgba(0, 63, 135, 0.06); }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased">

<!-- TopNavBar -->
<header class="fixed top-0 w-full z-40 bg-white/80 backdrop-blur-xl shadow-sm flex justify-between items-center h-16 px-8 border-b border-gray-100">
    <div class="flex items-center gap-8">
        <span class="text-xl font-bold text-[#003f87]">YA Consulting</span>
        <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-1.5 gap-2 w-64">
            <span class="material-symbols-outlined text-gray-400 text-lg">search</span>
            <input class="bg-transparent border-none text-sm focus:ring-0 w-full" placeholder="Rechercher..." type="text">
        </div>
    </div>
    <div class="flex items-center gap-4">
        <div class="h-8 w-8 rounded-full bg-[#003f87] flex items-center justify-center text-white text-sm font-bold">
            {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="pt-24 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

    <!-- Breadcrumbs avec icônes -->
    <nav class="flex items-center gap-2 mb-6 text-sm">
        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-[#003f87] transition flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">dashboard</span> Dashboard
        </a>
        <span class="text-gray-300">/</span>
        <a href="{{ route('interventions.index') }}" class="text-gray-400 hover:text-[#003f87] transition flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">engineering</span> Interventions
        </a>
        <span class="text-gray-300">/</span>
        <span class="text-[#003f87] font-semibold flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">add_circle</span> Nouvelle Intervention
        </span>
    </nav>

    <!-- Header -->
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
            <span class="w-10 h-10 rounded-xl bg-[#003f87]/10 flex items-center justify-center text-[#003f87]">
                <span class="material-symbols-outlined">add_circle</span>
            </span>
            Créer une Intervention
        </h1>
        <p class="text-gray-500 mt-1 ml-14">Remplissez les détails ci-dessous pour planifier une nouvelle mission technique.</p>
    </header>

    <!-- Messages flash -->
    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-500">check_circle</span> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200 flex items-center gap-2">
            <span class="material-symbols-outlined text-red-500">error</span> {{ session('error') }}
        </div>
    @endif
    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
            @foreach($errors->all() as $error)<p>• {{ $error }}</p>@endforeach
        </div>
    @endif

    <!-- Formulaire + Résumé -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Formulaire (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            <form action="{{ route('interventions.store') }}" method="POST" id="interventionForm">
                @csrf

                <!-- Informations Client -->
                <div class="bg-white rounded-2xl card-shadow p-6 border border-gray-100 hover:border-[#003f87]/20 transition">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-8 h-8 rounded-lg bg-[#003f87]/10 flex items-center justify-center text-[#003f87]">
                            <span class="material-symbols-outlined text-sm">person</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Informations Client</h3>
                        <span class="ml-auto text-xs text-gray-400">Étape 1/3</span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Client <span class="text-red-500">*</span></label>
                        <select name="client_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#003f87] focus:border-[#003f87] outline-none transition bg-gray-50/50" required>
                            <option value="">Sélectionner un client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->nom_entreprise }} - {{ $client->contact }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Détails -->
                <div class="bg-white rounded-2xl card-shadow p-6 border border-gray-100 hover:border-[#003f87]/20 transition">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-8 h-8 rounded-lg bg-[#003f87]/10 flex items-center justify-center text-[#003f87]">
                            <span class="material-symbols-outlined text-sm">article</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Détails de l'Intervention</h3>
                        <span class="ml-auto text-xs text-gray-400">Étape 2/3</span>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Type d'intervention <span class="text-red-500">*</span></label>
                            <input type="text" name="type_intervention" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#003f87] focus:border-[#003f87] outline-none transition bg-gray-50/50" placeholder="Ex: Maintenance, Installation, Audit..." value="{{ old('type_intervention') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Priorité <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-4 gap-2">
                                <button type="button" onclick="setPriority('basse')" class="priority-btn px-4 py-2 rounded-xl text-sm font-medium border-2 transition-all" data-priority="basse">
                                    <span class="w-2 h-2 rounded-full bg-green-500 inline-block mr-1"></span> Basse
                                </button>
                                <button type="button" onclick="setPriority('moyenne')" class="priority-btn px-4 py-2 rounded-xl text-sm font-medium border-2 border-[#003f87] bg-[#003f87]/5 text-[#003f87] transition-all active" data-priority="moyenne">
                                    <span class="w-2 h-2 rounded-full bg-[#003f87] inline-block mr-1"></span> Moyenne
                                </button>
                                <button type="button" onclick="setPriority('haute')" class="priority-btn px-4 py-2 rounded-xl text-sm font-medium border-2 transition-all" data-priority="haute">
                                    <span class="w-2 h-2 rounded-full bg-orange-500 inline-block mr-1"></span> Haute
                                </button>
                                <button type="button" onclick="setPriority('urgente')" class="priority-btn px-4 py-2 rounded-xl text-sm font-medium border-2 transition-all" data-priority="urgente">
                                    <span class="w-2 h-2 rounded-full bg-red-500 inline-block mr-1"></span> Urgente
                                </button>
                            </div>
                            <input type="hidden" name="priorite" id="priorite" value="moyenne">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
                            <textarea name="description" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#003f87] focus:border-[#003f87] outline-none transition bg-gray-50/50" rows="4" placeholder="Décrivez précisément l'intervention à réaliser..." required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Attribution -->
                <div class="bg-white rounded-2xl card-shadow p-6 border border-gray-100 hover:border-[#003f87]/20 transition">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-8 h-8 rounded-lg bg-[#003f87]/10 flex items-center justify-center text-[#003f87]">
                            <span class="material-symbols-outlined text-sm">calendar_month</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Attribution &amp; Planification</h3>
                        <span class="ml-auto text-xs text-gray-400">Étape 3/3</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Technicien</label>
                            <select name="technicien_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#003f87] focus:border-[#003f87] outline-none transition bg-gray-50/50">
                                <option value="">Non assigné</option>
                                @foreach($techniciens as $technicien)
                                    <option value="{{ $technicien->id }}" {{ old('technicien_id') == $technicien->id ? 'selected' : '' }}>
                                        {{ $technicien->nom }} ({{ $technicien->specialite ?? 'Polyvalent' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date &amp; Heure</label>
                            <input type="datetime-local" name="date_heure" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#003f87] focus:border-[#003f87] outline-none transition bg-gray-50/50" value="{{ old('date_heure') }}">
                        </div>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="flex justify-end gap-3 pt-2">
                    <a href="{{ route('interventions.index') }}" class="px-6 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition text-gray-600 font-medium flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">close</span> Annuler
                    </a>
                    <button type="submit" class="signature-gradient text-white px-8 py-3 rounded-xl font-semibold shadow-lg shadow-[#003f87]/20 hover:shadow-xl transition flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">add</span> Créer l'intervention
                    </button>
                </div>
            </form>
        </div>

        <!-- Résumé (1/3) -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl card-shadow p-6 border border-gray-100 sticky top-24">
                <div class="flex items-center gap-2 mb-6 pb-4 border-b border-gray-100">
                    <span class="material-symbols-outlined text-[#003f87]">receipt_long</span>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-gray-500">Résumé</h3>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2 border-b border-gray-50">
                        <span class="text-sm text-gray-500">Client</span>
                        <span class="text-sm font-medium text-gray-800" id="summaryClient">Non sélectionné</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-50">
                        <span class="text-sm text-gray-500">Type</span>
                        <span class="text-sm font-medium text-gray-800" id="summaryType">—</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-50">
                        <span class="text-sm text-gray-500">Priorité</span>
                        <span class="text-sm font-medium text-[#003f87]" id="summaryPriorite">Moyenne</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm text-gray-500">Technicien</span>
                        <span class="text-sm font-medium text-gray-800" id="summaryTechnicien">Non assigné</span>
                    </div>
                </div>
                <div class="mt-6 pt-6 border-t border-gray-100">
                    <div class="flex items-start gap-2 text-xs text-gray-400">
                        <span class="material-symbols-outlined text-sm text-[#003f87]">info</span>
                        <p>Tous les champs marqués d'une <span class="text-red-500">*</span> sont obligatoires.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function setPriority(priority) {
        document.getElementById('priorite').value = priority;
        const labels = { basse: 'Basse', moyenne: 'Moyenne', haute: 'Haute', urgente: 'Urgente' };
        document.getElementById('summaryPriorite').innerText = labels[priority];

        document.querySelectorAll('.priority-btn').forEach(btn => {
            btn.classList.remove('border-[#003f87]', 'bg-[#003f87]/5', 'text-[#003f87]');
            btn.classList.add('border-gray-200', 'text-gray-600');
        });
        event.currentTarget.classList.add('border-[#003f87]', 'bg-[#003f87]/5', 'text-[#003f87]');
        event.currentTarget.classList.remove('border-gray-200', 'text-gray-600');
    }

    // Mise à jour du résumé
    document.querySelector('select[name="client_id"]').addEventListener('change', function() {
        document.getElementById('summaryClient').innerText = this.options[this.selectedIndex]?.text || 'Non sélectionné';
    });
    document.querySelector('input[name="type_intervention"]').addEventListener('input', function() {
        document.getElementById('summaryType').innerText = this.value || '—';
    });
    document.querySelector('select[name="technicien_id"]').addEventListener('change', function() {
        document.getElementById('summaryTechnicien').innerText = this.options[this.selectedIndex]?.text || 'Non assigné';
    });
</script>

</body>
</html>