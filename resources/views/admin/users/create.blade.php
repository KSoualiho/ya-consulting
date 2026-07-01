<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ajouter un utilisateur - YA Consulting</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9ff; }
        .form-input-focus { transition: border-color 0.2s, box-shadow 0.2s; }
        .form-input-focus:focus { outline: none; border-color: #003f87; box-shadow: 0 0 0 3px rgba(0, 63, 135, 0.1); }
        .btn-primary { background: #003f87; }
        .btn-primary:hover { background: #002e63; }
    </style>
</head>
<body class="font-sans text-slate-900 min-h-screen flex flex-col">

<!-- TopAppBar -->
<header class="bg-white border-b border-slate-200 h-16 flex items-center px-6 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto w-full flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-[#003f87] rounded-lg flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
            </div>
            <div>
                <h1 class="font-bold text-lg leading-tight">YA Consulting</h1>
                <p class="text-[10px] uppercase tracking-wider text-slate-500 font-semibold">Gestion d'Interventions</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-semibold">{{ Auth::user()->name ?? 'Administrateur' }}</p>
                <p class="text-[10px] text-slate-400">{{ Auth::user()->email ?? 'admin@yaconsulting.com' }}</p>
            </div>
            <div class="w-8 h-8 rounded-full bg-[#003f87] flex items-center justify-center text-white text-sm font-bold">
                {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="flex-grow py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-slate-900">Ajouter un utilisateur</h2>
                <p class="text-slate-500 mt-1">Créez un nouveau compte utilisateur pour votre plateforme.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-[#003f87] transition-colors text-sm font-medium">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
                Retour
            </a>
        </div>

        <!-- Messages flash -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-700 border border-green-200">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 rounded-lg bg-red-50 text-red-700 border border-red-200">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 text-red-700 border border-red-200">
                @foreach($errors->all() as $error)<p>• {{ $error }}</p>@endforeach
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
            <form action="{{ route('admin.users.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <!-- Nom complet -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700" for="name">Nom complet <span class="text-red-500">*</span></label>
                    <input class="w-full px-4 py-2.5 rounded-lg border border-slate-300 form-input-focus placeholder-slate-400" id="name" name="name" placeholder="ex: Jean Dupont" required type="text" value="{{ old('name') }}">
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700" for="email">Email <span class="text-red-500">*</span></label>
                    <input class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50 form-input-focus" id="email" name="email" required type="email" value="{{ old('email') }}" placeholder="ex: jean@example.com">
                </div>

                <!-- Mot de passe -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700" for="password">Mot de passe <span class="text-red-500">*</span></label>
                        <input class="w-full px-4 py-2.5 rounded-lg border border-slate-300 form-input-focus" id="password" name="password" placeholder="••••••••••••" required type="password">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700" for="password_confirmation">Confirmer <span class="text-red-500">*</span></label>
                        <input class="w-full px-4 py-2.5 rounded-lg border border-slate-300 form-input-focus" id="password_confirmation" name="password_confirmation" placeholder="••••••••••••" required type="password">
                    </div>
                </div>

                <!-- Rôle -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700" for="role">Rôle <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select class="w-full pl-11 pr-4 py-2.5 rounded-lg border border-slate-300 appearance-none bg-white form-input-focus" id="role" name="role" required>
                            <option value="technicien" {{ old('role') == 'technicien' ? 'selected' : '' }}>👨‍🔧 Technicien</option>
                            <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>📊 Manager</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>👑 Administrateur</option>
                        </select>
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-lg">👨‍🔧</div>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path clip-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-100 mt-4">
                    <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50 rounded-lg transition-colors">
                        Annuler
                    </a>
                    <button type="submit" class="px-8 py-2.5 bg-[#003f87] hover:bg-[#002e63] text-white text-sm font-bold rounded-lg shadow-sm transition-all active:scale-[0.98]">
                        ENREGISTRER
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="py-6 px-6 border-t border-slate-200 mt-auto">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-400 text-xs font-medium">
        <p>© {{ date('Y') }} YA Consulting. Tous droits réservés.</p>
        <div class="flex gap-6">
            <a class="hover:text-[#003f87] transition-colors" href="#">Aide</a>
            <a class="hover:text-[#003f87] transition-colors" href="#">Support Technique</a>
            <a class="hover:text-[#003f87] transition-colors" href="#">Confidentialité</a>
        </div>
    </div>
</footer>

</body>
</html>