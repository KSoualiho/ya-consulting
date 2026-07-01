<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Azure Meridian - Détails Intervention {{ $intervention->numero }}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "on-primary": "#ffffff",
            "surface-tint": "#305da6",
            "on-surface": "#191c21",
            "inverse-surface": "#2e3036",
            "inverse-on-surface": "#eff0f7",
            "surface-container-lowest": "#ffffff",
            "tertiary-fixed-dim": "#ffb694",
            "primary-container": "#003f87",
            "on-secondary-container": "#47597f",
            "tertiary": "#4e1b00",
            "surface-container-low": "#f2f3fa",
            "on-secondary-fixed-variant": "#34466b",
            "primary-fixed": "#d7e2ff",
            "on-error-container": "#93000a",
            "on-secondary": "#ffffff",
            "surface-dim": "#d8dae1",
            "tertiary-container": "#722b00",
            "surface-bright": "#f8f9ff",
            "on-tertiary-container": "#f99361",
            "surface-container-highest": "#e1e2e9",
            "outline-variant": "#c3c6d2",
            "surface-container-high": "#e6e8ef",
            "on-tertiary-fixed-variant": "#793004",
            "secondary-container": "#bfd2fe",
            "tertiary-fixed": "#ffdbcc",
            "surface-variant": "#e1e2e9",
            "on-background": "#191c21",
            "inverse-primary": "#acc7ff",
            "on-primary-fixed": "#001a40",
            "on-secondary-fixed": "#041a3d",
            "on-primary-container": "#84adfc",
            "secondary-fixed": "#d8e2ff",
            "on-surface-variant": "#434751",
            "outline": "#737782",
            "on-tertiary": "#ffffff",
            "error-container": "#ffdad6",
            "primary": "#002a5d",
            "primary-fixed-dim": "#acc7ff",
            "surface-container": "#ecedf5",
            "on-error": "#ffffff",
            "secondary-fixed-dim": "#b4c6f2",
            "secondary": "#4c5e84",
            "on-primary-fixed-variant": "#0d458d",
            "on-tertiary-fixed": "#351000",
            "surface": "#f8f9ff",
            "error": "#ba1a1a",
            "background": "#f8f9ff"
          },
          borderRadius: {
            DEFAULT: "0.25rem",
            lg: "0.5rem",
            xl: "0.75rem",
            full: "9999px"
          },
          spacing: {
            "stack-sm": "0.5rem",
            "container-gap": "2rem",
            "header-height": "4rem",
            "card-padding": "2rem",
            "stack-md": "1rem",
            "sidebar-width": "16rem"
          },
          fontFamily: {
            "label-caps": ["Inter"],
            "body-base": ["Inter"],
            "h3": ["Inter"],
            "display": ["Inter"],
            "kpi-value": ["Inter"],
            "body-bold": ["Inter"]
          },
          fontSize: {
            "label-caps": ["10px", {"lineHeight": "1.2", "letterSpacing": "0.1em", "fontWeight": "800"}],
            "body-base": ["14px", {"lineHeight": "1.5", "letterSpacing": "0em", "fontWeight": "400"}],
            "h3": ["20px", {"lineHeight": "1.4", "letterSpacing": "-0.025em", "fontWeight": "700"}],
            "display": ["30px", {"lineHeight": "1.2", "letterSpacing": "-0.05em", "fontWeight": "800"}],
            "kpi-value": ["36px", {"lineHeight": "1", "letterSpacing": "-0.02em", "fontWeight": "900"}],
            "body-bold": ["14px", {"lineHeight": "1.5", "letterSpacing": "0em", "fontWeight": "700"}]
          }
        },
      },
    }
  </script>
<style>
    body { font-family: 'Inter', sans-serif; }
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      display: inline-block;
      line-height: 1;
      text-transform: none;
      letter-spacing: normal;
      word-wrap: normal;
      white-space: nowrap;
      direction: ltr;
    }
    .glass-header {
      background: rgba(248, 249, 255, 0.8);
      backdrop-filter: blur(12px);
    }
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e1e2e9; border-radius: 10px; }
  </style>
</head>
<body class="bg-surface text-on-surface min-h-screen">

<main class="min-h-screen">

<header class="w-full h-16 sticky top-0 z-40 bg-surface/80 backdrop-blur-md flex justify-between items-center px-8 border-b border-outline-variant">
<div class="flex items-center gap-4">
<a href="{{ route('interventions.index') }}" class="text-on-surface-variant hover:text-primary transition-colors flex items-center">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<div class="flex flex-col">
<h2 class="font-body-bold text-on-surface leading-tight">Intervention Details</h2>
<span class="text-[10px] text-outline font-bold uppercase tracking-wider">ID: {{ $intervention->numero }}</span>
</div>
</div>
<div class="flex items-center gap-6">
<div class="bg-primary text-on-primary px-3 py-1 rounded-full text-[10px] font-black uppercase flex items-center gap-1.5 shadow-sm">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
{{ $intervention->statut }}
</div>
<div class="h-8 w-px bg-outline-variant"></div>
<div class="flex items-center gap-2">
<a href="{{ route('notifications.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full text-on-surface-variant hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined">notifications</span>
</a>
<div class="w-10 h-10 rounded-full border-2 border-primary-container overflow-hidden ml-2 ring-2 ring-surface bg-primary flex items-center justify-center text-white font-bold">
{{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
</div>
</div>
</div>
</header>

<div class="p-8 grid grid-cols-12 gap-8 max-w-7xl mx-auto">

<div class="col-span-12 lg:col-span-8 space-y-8">

<div class="bg-surface-container-lowest rounded-2xl shadow-xl shadow-primary/5 overflow-hidden border border-outline-variant relative">
<div class="h-64 relative bg-gradient-to-r from-primary/20 to-primary/5">
<div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent"></div>
<div class="absolute bottom-8 left-8 text-on-primary">
<h2 class="font-display text-4xl mb-2">{{ $intervention->type_intervention }}</h2>
<p class="flex items-center gap-2 opacity-80 font-body-base">
<span class="material-symbols-outlined text-lg">location_on</span>
{{ $intervention->client->adresse ?? 'Adresse non renseignée' }}
</p>
</div>
</div>
<div class="p-8 grid grid-cols-3 gap-12 bg-surface-container-lowest">
<div class="flex flex-col gap-1">
<span class="text-label-caps font-label-caps text-outline uppercase">Date de réalisation</span>
<span class="font-body-bold text-on-surface text-lg">{{ $intervention->date_heure ? date('d M Y, H:i', strtotime($intervention->date_heure)) : 'Non planifiée' }}</span>
</div>
<div class="flex flex-col gap-1 border-l border-outline-variant pl-8">
<span class="text-label-caps font-label-caps text-outline uppercase">Durée</span>
<span class="font-body-bold text-on-surface text-lg">{{ $intervention->rapport->duree_minutes ?? 0 }} min</span>
</div>
<div class="flex flex-col gap-1 border-l border-outline-variant pl-8">
<span class="text-label-caps font-label-caps text-outline uppercase">Équipe</span>
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center text-[10px] font-bold">
{{ substr($intervention->technicien->nom ?? 'ND', 0, 2) }}
</div>
<span class="font-body-bold text-on-surface">{{ $intervention->technicien->nom ?? 'Non assigné' }}</span>
</div>
</div>
</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">

<div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant hover:shadow-md transition-shadow flex flex-col h-full">
<div class="flex items-center gap-3 mb-8 text-primary border-b border-outline-variant pb-4">
<span class="material-symbols-outlined">info</span>
<h3 class="font-h3 text-h3">Informations Générales</h3>
</div>
<div class="space-y-6 flex-1">
<div>
<span class="text-label-caps font-label-caps text-outline block mb-1">CLIENT</span>
<span class="font-display text-xl text-primary font-bold">{{ $intervention->client->nom_entreprise ?? 'N/A' }}</span>
</div>
<div>
<span class="text-label-caps font-label-caps text-outline block mb-1">CONTACT PRINCIPAL</span>
<span class="font-body-bold text-on-surface">{{ $intervention->client->contact ?? 'N/A' }}</span>
</div>
<div>
<span class="text-label-caps font-label-caps text-outline block mb-1">ADRESSE</span>
<span class="font-body-base text-on-surface">{{ $intervention->client->adresse ?? 'Non renseignée' }}</span>
</div>
<div class="pt-4 mt-auto">
<span class="text-label-caps font-label-caps text-outline block mb-1">TÉLÉPHONE</span>
<a class="font-body-bold text-primary flex items-center gap-2 hover:underline" href="tel:{{ $intervention->client->telephone ?? '' }}">
<span class="material-symbols-outlined text-sm">call</span>
{{ $intervention->client->telephone ?? 'Non renseigné' }}
</a>
</div>
</div>
</div>

<div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant hover:shadow-md transition-shadow flex flex-col h-full">
<div class="flex items-center gap-3 mb-8 text-primary border-b border-outline-variant pb-4">
<span class="material-symbols-outlined">settings_suggest</span>
<h3 class="font-h3 text-h3">Détails Techniques</h3>
</div>
<div class="space-y-6 flex-1">
<div class="flex justify-between items-start">
<div>
<span class="text-label-caps font-label-caps text-outline block mb-1">TYPE D'INTERVENTION</span>
<span class="font-body-bold text-on-surface text-lg">{{ $intervention->type_intervention }}</span>
</div>
<div class="text-right">
<span class="text-label-caps font-label-caps text-outline block mb-1">PRIORITÉ</span>
<span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full text-[10px] font-black uppercase">{{ $intervention->priorite }}</span>
</div>
</div>
<div>
<span class="text-label-caps font-label-caps text-outline block mb-2">DESCRIPTION DU PROBLÈME</span>
<div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/50 text-on-surface-variant italic relative">
<span class="material-symbols-outlined absolute -top-3 -left-2 text-primary-container/20 text-4xl">format_quote</span>
{{ $intervention->description ?: 'Aucune description' }}
</div>
</div>
</div>
</div>
</div>

@if($intervention->rapport)
    <!-- Afficher le rapport existant -->
    <div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant">
        <div class="flex justify-between items-center mb-8 border-b border-outline-variant pb-4">
            <div class="flex items-center gap-3 text-primary">
                <span class="material-symbols-outlined">description</span>
                <h3 class="font-h3 text-h3">Rapport d'Intervention</h3>
            </div>
            <a href="{{ route('export.rapport', $intervention->rapport) }}" class="bg-primary-container/10 text-primary-container font-body-bold py-2 px-4 rounded-xl flex items-center gap-2 hover:bg-primary-container/20 transition-all text-xs uppercase">
                <span class="material-symbols-outlined text-sm">download</span>
                Télécharger PDF
            </a>
        </div>
        <div class="relative">
            <p class="w-full border border-outline-variant bg-surface-container-low rounded-xl p-6 font-body-base text-on-surface">
                {{ $intervention->rapport->actions_realisees ?: 'Aucune action renseignée' }}
            </p>
        </div>
        @if(!$intervention->rapport->valide && Auth::user()->role != 'technicien')
        <div class="flex justify-end gap-4 mt-6">
            <form action="{{ route('rapports.valider', $intervention->rapport) }}" method="POST">
                @csrf
                <button type="submit" class="bg-primary text-on-primary px-8 py-3 rounded-xl font-body-bold hover:shadow-lg transition-all text-sm uppercase tracking-wide">
                    Valider le rapport
                </button>
            </form>
        </div>
        @endif
    </div>
@else
    <!-- Aucun rapport - Afficher message et bouton -->
    <div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant text-center">
        <span class="material-symbols-outlined text-5xl text-outline mb-4">description</span>
        <h3 class="text-xl font-bold text-on-surface mb-2">Aucun rapport disponible</h3>
        <p class="text-on-surface-variant mb-6">Aucun rapport n'a encore été soumis pour cette intervention.</p>
        @if(Auth::user()->role != 'technicien' || $intervention->technicien_id == Auth::id())
            <a href="{{ route('rapports.create', $intervention) }}" class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-xl font-body-bold hover:bg-primary-container transition-all">
                <span class="material-symbols-outlined">add</span>
                Ajouter un rapport
            </a>
        @else
            <p class="text-sm text-on-surface-variant">Seul le technicien assigné peut ajouter un rapport.</p>
        @endif
    </div>
@endif

<div class="col-span-12 lg:col-span-4 space-y-8">

<div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant flex flex-col">
<div class="flex items-center gap-3 mb-8 text-primary border-b border-outline-variant pb-4">
<span class="material-symbols-outlined">history</span>
<h3 class="font-h3 text-h3">Historique des modifications</h3>
</div>
<div class="space-y-4 relative pl-4">
<div class="absolute left-2 top-2 bottom-2 w-1 bg-gradient-to-b from-primary to-primary/30 rounded-full"></div>

@php
    $activities = \App\Models\ActivityLog::where('intervention_id', $intervention->id)
        ->with('user')
        ->orderBy('created_at', 'desc')
        ->get();
@endphp

@if($activities->count() > 0)
    @foreach($activities as $activity)
    <div class="relative flex gap-4 pb-4 border-b border-outline-variant/20">
        <div class="z-10 w-3 h-3 rounded-full {{ $activity->action === 'create' ? 'bg-primary' : ($activity->action === 'validate' ? 'bg-green-500' : 'bg-blue-400') }} ring-4 ring-surface mt-1.5 flex-shrink-0"></div>
        <div class="flex-1 min-w-0">
            <div class="flex justify-between items-start mb-1 gap-2">
                <div class="min-w-0">
                    <span class="font-body-bold text-on-surface text-sm block truncate">
                        {{ $activity->description }}
                    </span>
                    @if($activity->user)
                    <p class="text-xs text-on-surface-variant">Par <span class="font-semibold">{{ $activity->user->name }}</span></p>
                    @endif
                </div>
                <span class="text-[10px] text-outline font-bold uppercase whitespace-nowrap">{{ $activity->created_at->format('d/m H:i') }}</span>
            </div>
            
            @if($activity->old_values || $activity->new_values)
            <div class="text-xs text-on-surface-variant mt-2 bg-slate-50 p-2 rounded border border-outline-variant/20">
                @if(isset($activity->old_values['statut']) && isset($activity->new_values['statut']))
                    <p><span class="font-semibold">Statut:</span> {{ $activity->old_values['statut'] ?? 'N/A' }} → {{ $activity->new_values['statut'] ?? 'N/A' }}</p>
                @endif
                @if(isset($activity->old_values['technicien_id']) && isset($activity->new_values['technicien_id']))
                    <p><span class="font-semibold">Technicien:</span> Changé</p>
                @endif
                @if(isset($activity->new_values['priorite']))
                    <p><span class="font-semibold">Priorité:</span> {{ $activity->new_values['priorite'] ?? 'N/A' }}</p>
                @endif
            </div>
            @endif
        </div>
    </div>
    @endforeach
@else
    <div class="relative flex gap-4">
        <div class="z-10 w-3 h-3 rounded-full bg-primary ring-4 ring-surface mt-1.5"></div>
        <div class="flex-1">
            <p class="text-xs text-on-surface-variant italic">Intervention créée le {{ $intervention->created_at->format('d/m/Y à H:i') }}</p>
        </div>
    </div>
@endif
</div>

@if($intervention->rapport && $intervention->rapport->photo_path)
<div class="mt-12 pt-8 border-t border-outline-variant">
<div class="flex justify-between items-center mb-4">
<h4 class="text-label-caps font-label-caps text-outline uppercase tracking-widest">Photos du site</h4>
</div>
<div class="grid grid-cols-2 gap-3">
<div class="aspect-[4/3] rounded-xl overflow-hidden border border-outline-variant group relative cursor-pointer shadow-sm">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ asset('storage/' . $intervention->rapport->photo_path) }}" alt="Photo intervention"/>
<div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary text-3xl">zoom_in</span>
</div>
</div>
</div>
</div>
@endif
</div>

<div class="bg-surface-container-lowest rounded-2xl shadow-sm border border-outline-variant overflow-hidden">
<div class="p-6 border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
<span class="text-label-caps font-label-caps text-outline uppercase tracking-widest">Localisation</span>
<a href="https://maps.google.com/?q={{ urlencode($intervention->client->adresse ?? '') }}" target="_blank" class="bg-primary text-on-primary text-[10px] font-black uppercase px-3 py-1 rounded-full shadow-sm hover:bg-primary-container transition-colors">
Ouvrir Maps
</a>
</div>
<div class="h-64 relative saturate-0 contrast-125 opacity-90 overflow-hidden bg-gray-200 flex items-center justify-center">
<span class="material-symbols-outlined text-6xl text-gray-400">map</span>
<div class="absolute bottom-4 left-4 right-4 bg-surface/90 backdrop-blur-sm p-3 rounded-lg border border-outline-variant flex items-center justify-between">
<span class="text-xs font-body-bold text-on-surface">{{ $intervention->client->adresse ?: 'Adresse non renseignée' }}</span>
</div>
</div>
</div>
</div>
</div>
</main>
</body>
</html>