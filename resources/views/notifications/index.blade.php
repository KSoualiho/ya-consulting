<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Notifications - Azure Meridian</title>
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
                        "secondary-fixed": "#d7e2ff",
                        "on-tertiary-container": "#ffc2a7",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#983c00",
                        "on-error": "#ffffff",
                        "surface-container-highest": "#e1e2ea",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "error-container": "#ffdad6",
                        "on-secondary": "#ffffff",
                        "surface-dim": "#d9d9e2",
                        "surface-container-low": "#f2f3fc",
                        "on-primary-fixed": "#001a40",
                        "error": "#ba1a1a",
                        "surface-container-lowest": "#ffffff",
                        "background": "#f9f9ff",
                        "on-secondary-fixed": "#041b3c",
                        "surface": "#f9f9ff",
                        "outline": "#727784",
                        "surface-bright": "#f9f9ff",
                        "on-error-container": "#93000a",
                        "outline-variant": "#c2c6d4",
                        "tertiary": "#722b00",
                        "inverse-on-surface": "#f0f0f9",
                        "on-secondary-container": "#475a7f",
                        "surface-tint": "#115cb9",
                        "on-secondary-fixed-variant": "#34476a",
                        "primary-fixed": "#d7e2ff",
                        "on-primary-fixed-variant": "#004491",
                        "on-primary": "#ffffff",
                        "inverse-primary": "#acc7ff",
                        "surface-container": "#ededf6",
                        "on-tertiary-fixed": "#351000",
                        "tertiary-fixed-dim": "#ffb694",
                        "secondary-container": "#bfd2fd",
                        "primary": "#003f87",
                        "on-surface": "#191c21",
                        "primary-fixed-dim": "#acc7ff",
                        "primary-container": "#0056b3",
                        "on-primary-container": "#bbd0ff",
                        "secondary": "#4c5e84",
                        "surface-container-high": "#e7e8f0",
                        "secondary-fixed-dim": "#b3c7f1",
                        "inverse-surface": "#2e3037",
                        "tertiary-fixed": "#ffdbcc",
                        "on-surface-variant": "#424752"
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
        .ambient-shadow {
            box-shadow: 0 8px 32px 0 rgba(25, 28, 33, 0.06);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased">

<!-- Main Content Area -->
<main class="flex flex-col min-h-screen">

    <!-- TopNavBar Shell -->
    <header class="w-full h-16 bg-[#f9f9ff] flex justify-between items-center px-8 z-40 sticky top-0">
        <div class="flex items-center flex-1">
            <div class="flex items-center bg-[#f2f3fc] px-4 py-2 rounded-full w-full max-w-md">
                <span class="material-symbols-outlined text-on-surface-variant mr-3">search</span>
                <input id="searchInput" class="bg-transparent border-none outline-none text-sm w-full text-on-surface placeholder-outline" placeholder="Rechercher..." type="text">
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="relative p-2 text-blue-700 font-semibold cursor-pointer hover:bg-[#ededf6] transition-colors rounded-full">
                <span class="material-symbols-outlined">notifications</span>
                @if($nonLues > 0)
                <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
                @endif
            </div>
            <div class="ml-4 flex items-center gap-3 pl-4 border-l border-surface-variant">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                    {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
                </div>
                <span class="text-sm font-medium text-on-surface">{{ Auth::user()->name ?? 'Admin' }}</span>
            </div>
        </div>
    </header>

    <!-- Notification Content -->
    <section class="flex-1 flex flex-col p-12 bg-surface-container-low">
        <div class="flex items-baseline justify-between mb-16">
            <div>
                <h2 class="text-3xl font-bold text-on-surface tracking-tight mb-2">Notifications</h2>
                <p class="text-on-surface-variant max-w-lg">Restez informé des mises à jour en temps réel sur vos opérations et vos techniciens.</p>
            </div>
            <div class="flex gap-4">
                @if($nonLues > 0)
                <form action="{{ route('notifications.markAllRead') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-6 py-2.5 text-sm font-medium text-primary hover:bg-surface-container transition-colors rounded-lg">
                        Tout marquer comme lu
                    </button>
                </form>
                @endif
            </div>
        </div>

        @if($notifications->count() > 0)
            <!-- Liste des notifications -->
            <div class="space-y-4">
                @foreach($notifications as $notification)
                <div class="bg-surface-container-lowest rounded-xl ambient-shadow overflow-hidden border border-outline-variant/10 
                    {{ !$notification->lue ? 'border-l-4 border-l-primary' : '' }}">
                    <div class="p-6 flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4 flex-1">
                            <!-- Icône selon le type -->
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center 
                                @if($notification->type == 'assignation') bg-blue-100 text-blue-600
                                @elseif($notification->type == 'changement_statut') bg-amber-100 text-amber-600
                                @elseif($notification->type == 'rappel_rapport') bg-orange-100 text-orange-600
                                @elseif($notification->type == 'rapport_soumis') bg-purple-100 text-purple-600
                                @elseif($notification->type == 'rapport_valide') bg-green-100 text-green-600
                                @else bg-gray-100 text-gray-600
                                @endif">
                                <span class="material-symbols-outlined">
                                    @if($notification->type == 'assignation') person_add
                                    @elseif($notification->type == 'changement_statut') sync
                                    @elseif($notification->type == 'rappel_rapport') reminder
                                    @elseif($notification->type == 'rapport_soumis') file_upload
                                    @elseif($notification->type == 'rapport_valide') check_circle
                                    @else notifications
                                    @endif
                                </span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <h4 class="font-bold text-on-surface">{{ $notification->titre }}</h4>
                                    @if(!$notification->lue)
                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-primary/10 text-primary font-semibold">Nouveau</span>
                                    @endif
                                </div>
                                <p class="text-sm text-on-surface-variant mb-2">{{ $notification->message }}</p>
                                <div class="flex items-center gap-4 text-xs text-outline">
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">schedule</span>
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                    @if($notification->intervention_id)
                                    <a href="{{ route('interventions.show', $notification->intervention_id) }}" class="text-primary hover:underline flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                                        Voir l'intervention
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!$notification->lue)
                        <button onclick="markAsRead({{ $notification->id }})" class="p-2 text-outline hover:text-primary transition-colors" title="Marquer comme lu">
                            <span class="material-symbols-outlined">mark_email_read</span>
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                {{ $notifications->links() }}
            </div>
        @else
            <!-- Empty State Container -->
            <div class="flex-1 flex items-center justify-center">
                <div class="max-w-xl w-full flex flex-col items-center text-center">
                    <div class="relative w-full py-20 px-8 bg-surface-container-lowest rounded-[2rem] ambient-shadow overflow-hidden">
                        <div class="absolute -top-12 -right-12 w-64 h-64 bg-primary-container/10 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-secondary-container/10 rounded-full blur-3xl"></div>
                        <div class="relative z-10">
                            <div class="w-24 h-24 mx-auto mb-8 flex items-center justify-center rounded-3xl bg-surface-container-low border border-white/50">
                                <span class="material-symbols-outlined text-5xl text-outline-variant opacity-60">notifications_off</span>
                            </div>
                            <h3 class="text-2xl font-bold text-on-surface mb-4">Aucune notification pour le moment</h3>
                            <p class="text-on-surface-variant leading-relaxed px-12">
                                Nous vous informerons dès qu'il y aura du nouveau concernant vos interventions ou vos clients. Vos mises à jour critiques apparaîtront ici.
                            </p>
                            <div class="mt-10 flex flex-wrap justify-center gap-4">
                                <button onclick="location.reload()" class="signature-gradient text-white px-8 py-3 rounded-xl font-medium text-sm flex items-center gap-2 hover:opacity-90 transition-opacity">
                                    <span class="material-symbols-outlined text-lg">refresh</span>
                                    Actualiser la page
                                </button>
                                <a href="{{ route('interventions.index') }}" class="bg-surface-container-low text-on-surface-variant px-8 py-3 rounded-xl font-medium text-sm hover:bg-surface-container transition-colors">
                                    Consulter les interventions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Focus Panel -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-surface-container-lowest p-8 rounded-2xl ambient-shadow flex flex-col gap-4 border border-outline-variant/10">
                <span class="material-symbols-outlined text-primary-container">verified_user</span>
                <h4 class="font-bold text-on-surface">Sécurité Active</h4>
                <p class="text-sm text-on-surface-variant">Toutes les notifications système sont cryptées de bout en bout.</p>
            </div>
            <div class="bg-surface-container-lowest p-8 rounded-2xl ambient-shadow flex flex-col gap-4 border border-outline-variant/10">
                <span class="material-symbols-outlined text-secondary">bolt</span>
                <h4 class="font-bold text-on-surface">Alertes Prioritaires</h4>
                <p class="text-sm text-on-surface-variant">Les incidents critiques sont signalés immédiatement.</p>
            </div>
            <div class="bg-surface-container-lowest p-8 rounded-2xl ambient-shadow flex flex-col gap-4 border border-outline-variant/10">
                <span class="material-symbols-outlined text-tertiary">tune</span>
                <h4 class="font-bold text-on-surface">Personnalisation</h4>
                <p class="text-sm text-on-surface-variant">Ajustez vos préférences de réception dans vos réglages de profil.</p>
            </div>
        </div>
    </section>
</main>

<script>
    function markAsRead(id) {
        fetch(`/notifications/${id}/read`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              }
          });
    }

    // Recherche dans les notifications
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let searchTerm = this.value.toLowerCase();
        let notifications = document.querySelectorAll('.bg-surface-container-lowest');
        notifications.forEach(notification => {
            let text = notification.innerText.toLowerCase();
            notification.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>

</body>
</html>