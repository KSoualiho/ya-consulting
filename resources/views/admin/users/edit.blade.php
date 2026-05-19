<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier utilisateur - YA Consulting</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'azure-primary': '#003f87',
                        'azure-surface': '#f8f9ff',
                        'azure-border': '#e2e8f0',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    borderRadius: {
                        'azure-radius': '8px',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9ff;
            color: #1e293b;
        }
    </style>
</head>
<body class="min-h-screen">

<!-- Top Navigation Bar -->
<header class="bg-white border-b border-azure-border px-8 py-3 flex items-center justify-between sticky top-0 z-50">
    <div class="flex items-center gap-4">
        <div class="bg-azure-primary text-white font-bold p-2 rounded-azure-radius text-sm">YA</div>
        <h1 class="text-lg font-semibold text-slate-800">Gestion interventions</h1>
    </div>
    <div class="flex items-center gap-6">
        <div class="flex items-center gap-3 pl-6 border-l border-slate-200">
            <div class="text-right">
                <p class="text-sm font-semibold text-slate-900">{{ Auth::user()->name ?? 'Administrateur' }}</p>
                <p class="text-xs text-slate-500">{{ Auth::user()->role ?? 'Admin System' }}</p>
            </div>
            <div class="h-10 w-10 rounded-full bg-azure-primary/10 flex items-center justify-center text-azure-primary font-bold">
                {{ substr(Auth::user()->name ?? 'AD', 0, 1) }}
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="max-w-4xl mx-auto px-6 py-10">
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Modifier utilisateur</h2>
            <p class="text-slate-500 mt-1">Modifiez les informations du compte</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 text-slate-600 hover:text-azure-primary transition-colors font-medium">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
            Retour
        </a>
    </div>

    <!-- Edit Form Card -->
    <div class="bg-white rounded-azure-radius shadow-sm border border-azure-border p-8">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nom complet -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2" for="name">Nom complet *</label>
                <input class="w-full px-4 py-3 rounded-azure-radius border border-slate-200 focus:ring-2 focus:ring-azure-primary focus:border-azure-primary outline-none transition-all" 
                       id="name" name="name" required type="text" value="{{ old('name', $user->name) }}">
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2" for="email">Email *</label>
                <input class="w-full px-4 py-3 rounded-azure-radius border border-slate-200 focus:ring-2 focus:ring-azure-primary focus:border-azure-primary outline-none transition-all" 
                       id="email" name="email" required type="email" value="{{ old('email', $user->email) }}">
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2" for="password">Mot de passe (laisser vide pour ne pas modifier)</label>
                <input class="w-full px-4 py-3 rounded-azure-radius border border-slate-200 focus:ring-2 focus:ring-azure-primary focus:border-azure-primary outline-none transition-all" 
                       id="password" name="password" type="password">
                @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Confirmer le mot de passe -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2" for="password_confirmation">Confirmer le mot de passe</label>
                <input class="w-full px-4 py-3 rounded-azure-radius border border-slate-200 focus:ring-2 focus:ring-azure-primary focus:border-azure-primary outline-none transition-all" 
                       id="password_confirmation" name="password_confirmation" type="password">
            </div>

            <!-- Rôle -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2" for="role">Rôle *</label>
                <div class="relative">
                    <select class="w-full px-4 py-3 pl-10 rounded-azure-radius border border-slate-200 focus:ring-2 focus:ring-azure-primary focus:border-azure-primary outline-none transition-all appearance-none bg-white" 
                            id="role" name="role" required>
                        <option value="technicien" {{ $user->role == 'technicien' ? 'selected' : '' }}>👨‍🔧 Technicien</option>
                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>📊 Manager</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>👑 Administrateur</option>
                    </select>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                        <span>👨‍🔧</span>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                @error('role') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-slate-100">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 text-sm font-semibold text-slate-600 hover:text-slate-800 transition-colors">
                    Annuler
                </a>
                <button type="submit" class="bg-azure-primary text-white px-10 py-2.5 rounded-azure-radius text-sm font-bold hover:bg-blue-900 transition-shadow shadow-md active:scale-95">
                    ENREGISTRER
                </button>
            </div>
        </form>
    </div>
</main>

</body>
</html>