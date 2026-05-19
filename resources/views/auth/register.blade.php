<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - YA Consulting</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .signature-gradient {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 100%);
        }
    </style>
</head>
<body class="bg-[#f5f5f0] min-h-screen flex items-center justify-center">
    <div class="flex w-full max-w-5xl bg-white rounded-3xl overflow-hidden shadow-2xl">
        <!-- Left side -->
        <div class="flex-1 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-12 flex flex-col justify-between text-white">
            <div>
                <h1 class="text-3xl font-bold mb-2">YA Consulting</h1>
                <p class="opacity-70 text-sm">Solutions professionnelles</p>
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Inscription</h2>
                <p class="opacity-70">Créez votre compte pour accéder à la plateforme</p>
            </div>
            <p class="text-xs opacity-50">&copy; 2026 YA Consulting</p>
        </div>

        <!-- Right side -->
        <div class="flex-1 p-12">
            <h2 class="text-2xl font-bold text-[#1a1a2e] mb-2">Créer un compte</h2>
            <p class="text-gray-500 text-sm mb-8">Remplissez le formulaire ci-dessous</p>

            @if($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-50 text-red-600 text-sm">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Nom complet</label>
                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#003f87] focus:outline-none" placeholder="Jean Dupont" required value="{{ old('name') }}">
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Adresse e-mail</label>
                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#003f87] focus:outline-none" placeholder="nom@exemple.com" required value="{{ old('email') }}">
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Mot de passe</label>
                    <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#003f87] focus:outline-none" placeholder="********" required>
                </div>
                <div class="mb-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#003f87] focus:outline-none" placeholder="********" required>
                </div>
                <button type="submit" class="w-full signature-gradient text-white py-3 rounded-xl font-bold hover:opacity-90 transition-all">
                    S'inscrire
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Déjà un compte ? 
                <a href="{{ route('login') }}" class="text-[#003f87] font-semibold hover:underline">Se connecter</a>
            </p>
        </div>
    </div>
</body>
</html>