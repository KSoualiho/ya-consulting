<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Rapport d'intervention - Azure Meridian</title>
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
                        "headline": ["Inter", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .signature-pad {
            background-image: radial-gradient(#c2c6d4 0.5px, transparent 0.5px);
            background-size: 10px 10px;
        }
        .focus-panel-shadow {
            box-shadow: 0 8px 40px rgba(25, 28, 33, 0.06);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface">

<!-- SideNavBar -->

<!-- Main Content -->
<main class="md:ml-64 min-h-screen">
    <!-- TopNavBar -->
    <header class="fixed top-0 right-0 left-0 md:left-64 z-40 bg-[#f9f9ff]/80 backdrop-blur-xl shadow-sm h-16 flex justify-between items-center px-8">
        <div class="flex items-center gap-4">
            <nav class="hidden md:flex items-center gap-6">
                <span class="text-sm font-medium text-[#003f87] border-b-2 border-[#003f87] pb-1">Nouveau Rapport</span>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <div class="h-8 w-8 rounded-full bg-primary flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'JD', 0, 1) }}
            </div>
        </div>
    </header>

    <!-- Form Content -->
    <div class="pt-24 pb-12 px-8 max-w-5xl mx-auto">
        <!-- Header Section -->
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="text-xs font-bold uppercase tracking-[0.1em] text-primary mb-2 block">Intervention #{{ $intervention->numero }}</span>
                <h2 class="text-4xl font-bold tracking-tight text-on-surface">Rapport d'intervention</h2>
                <p class="text-on-surface-variant mt-2 max-w-md">Veuillez consigner les détails techniques et les actions effectuées lors de votre passage chez le client.</p>
            </div>
            <div class="flex items-center gap-4 bg-surface-container-low p-4 rounded-xl">
                <div class="text-right">
                    <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Client</p>
                    <p class="font-bold">{{ $intervention->client->nom_entreprise ?? 'N/A' }}</p>
                </div>
                <div class="h-10 w-[1px] bg-outline-variant/30"></div>
                <div class="text-right">
                    <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Date</p>
                    <p class="font-bold">{{ $intervention->date_heure ? date('d M Y', strtotime($intervention->date_heure)) : 'Non planifiée' }}</p>
                </div>
            </div>
        </div>

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

        <!-- Form -->
        <form action="{{ route('rapports.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-12 gap-8">
            @csrf
            <input type="hidden" name="intervention_id" value="{{ $intervention->id }}">

            <!-- Colonne principale -->
            <div class="md:col-span-8 space-y-8">
                <!-- Description -->
                <section class="bg-surface-container-lowest p-8 rounded-xl focus-panel-shadow">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary-container/10 rounded-lg">
                            <span class="material-symbols-outlined text-primary">subject</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Description du problème</h3>
                    </div>
                    <textarea name="description" class="w-full bg-surface-container-low border-none rounded-xl p-4 text-on-surface placeholder:text-on-surface-variant/50 focus:ring-1 focus:ring-primary min-h-[120px] transition-all" placeholder="Décrivez l'état initial constaté à votre arrivée..." required>{{ old('description') }}</textarea>
                </section>

                <!-- Actions réalisées -->
                <section class="bg-surface-container-lowest p-8 rounded-xl focus-panel-shadow">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary-container/10 rounded-lg">
                            <span class="material-symbols-outlined text-primary">task_alt</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Actions réalisées</h3>
                    </div>
                    <textarea name="actions_realisees" class="w-full bg-surface-container-low border-none rounded-xl p-4 text-on-surface placeholder:text-on-surface-variant/50 focus:ring-1 focus:ring-primary min-h-[120px] transition-all" placeholder="Listez les actions réalisées..." required>{{ old('actions_realisees') }}</textarea>
                </section>

                <!-- Pièces utilisées -->
                <section class="bg-surface-container-lowest p-8 rounded-xl focus-panel-shadow">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-primary-container/10 rounded-lg">
                                <span class="material-symbols-outlined text-primary">inventory_2</span>
                            </div>
                            <h3 class="text-lg font-bold text-on-surface">Pièces utilisées</h3>
                        </div>
                    </div>
                    <input type="text" name="pieces_utilisees" class="w-full bg-surface-container-low border-none rounded-xl p-4 text-on-surface placeholder:text-on-surface-variant/50 focus:ring-1 focus:ring-primary transition-all" placeholder="Ex: Vanne 3 voies, Joint silicone, ..." value="{{ old('pieces_utilisees') }}">
                </section>
            </div>

            <!-- Colonne latérale -->
            <div class="md:col-span-4 space-y-8">
                <!-- Durée -->
                <section class="bg-surface-container-lowest p-6 rounded-xl focus-panel-shadow">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary-container/10 rounded-lg">
                            <span class="material-symbols-outlined text-primary">schedule</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Durée</h3>
                    </div>
                    <select name="duree_minutes" class="w-full bg-surface-container-low border-none rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary">
                        <option value="30">30 minutes</option>
                        <option value="60">1 heure</option>
                        <option value="90">1h30</option>
                        <option value="120" selected>2 heures</option>
                        <option value="180">3 heures</option>
                        <option value="240">4 heures</option>
                    </select>
                </section>

                <!-- Photos -->
                <section class="bg-surface-container-lowest p-6 rounded-xl focus-panel-shadow">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary-container/10 rounded-lg">
                            <span class="material-symbols-outlined text-primary">photo_camera</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Photos</h3>
                    </div>
                    <input type="file" name="photo" class="w-full bg-surface-container-low border-none rounded-lg p-2 text-sm focus:ring-1 focus:ring-primary" accept="image/*">
                    <p class="text-[10px] text-on-surface-variant italic mt-2">Format JPG/PNG supporté. Max 10Mo par fichier.</p>
                </section>

                <!-- Signature Client -->
                <section class="bg-surface-container-lowest p-6 rounded-xl focus-panel-shadow">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary-container/10 rounded-lg">
                            <span class="material-symbols-outlined text-primary">draw</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Signature Client</h3>
                    </div>
                    <canvas id="signatureCanvas" class="signature-pad w-full h-32 rounded-xl border border-outline-variant/10 cursor-crosshair" style="background: white;"></canvas>
                    <input type="hidden" name="signature_client" id="signatureData">
                    <button type="button" onclick="clearSignature()" class="mt-2 text-xs text-on-surface-variant hover:text-primary transition-colors">Effacer la signature</button>
                    <div class="mt-4 flex items-center gap-3">
                        <input type="checkbox" name="validation_client" id="validation" class="rounded border-outline-variant text-primary focus:ring-primary">
                        <label class="text-[11px] text-on-surface-variant leading-tight" for="validation">Le client certifie que les travaux ont été réalisés conformément au contrat.</label>
                    </div>
                </section>

                <!-- Satisfaction client -->
                <section class="bg-surface-container-lowest p-6 rounded-xl focus-panel-shadow">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary-container/10 rounded-lg">
                            <span class="material-symbols-outlined text-primary">star</span>
                        </div>
                        <h3 class="text-lg font-bold text-on-surface">Satisfaction client</h3>
                    </div>
                    <select name="satisfaction_client" class="w-full bg-surface-container-low border-none rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-primary">
                        <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                        <option value="4">⭐⭐⭐⭐ - Très bien</option>
                        <option value="3" selected>⭐⭐⭐ - Bien</option>
                        <option value="2">⭐⭐ - Moyen</option>
                        <option value="1">⭐ - Insatisfait</option>
                    </select>
                </section>

                <!-- Boutons action -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white py-4 rounded-xl font-bold text-sm uppercase tracking-[0.1em] shadow-lg hover:shadow-primary/20 active:scale-95 transition-all duration-200 flex items-center justify-center gap-3">
                        Soumettre Rapport
                        <span class="material-symbols-outlined text-lg">send</span>
                    </button>
                    <a href="{{ route('interventions.show', $intervention) }}" class="w-full mt-4 text-on-surface-variant hover:text-on-surface text-xs font-bold uppercase tracking-widest py-2 transition-colors block text-center">
                        Annuler
                    </a>
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    // Signature canvas
    let canvas = document.getElementById('signatureCanvas');
    let ctx = canvas.getContext('2d');
    let drawing = false;

    function resizeCanvas() {
        let container = canvas.parentElement;
        let width = container.clientWidth - 32;
        canvas.width = width;
        canvas.height = 128;
        ctx.strokeStyle = '#003f87';
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    function startDrawing(e) {
        drawing = true;
        let rect = canvas.getBoundingClientRect();
        let x = (e.clientX || e.touches[0].clientX) - rect.left;
        let y = (e.clientY || e.touches[0].clientY) - rect.top;
        ctx.beginPath();
        ctx.moveTo(x, y);
    }

    function draw(e) {
        if (!drawing) return;
        e.preventDefault();
        let rect = canvas.getBoundingClientRect();
        let x = (e.clientX || e.touches[0].clientX) - rect.left;
        let y = (e.clientY || e.touches[0].clientY) - rect.top;
        ctx.lineTo(x, y);
        ctx.stroke();
    }

    function stopDrawing() {
        drawing = false;
        document.getElementById('signatureData').value = canvas.toDataURL();
    }

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        document.getElementById('signatureData').value = '';
    }

    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('touchstart', startDrawing);
    canvas.addEventListener('touchmove', draw);
    canvas.addEventListener('touchend', stopDrawing);
</script>

</body>
</html>