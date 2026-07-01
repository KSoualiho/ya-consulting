<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Inscription - YA Consulting</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f5f5f0; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 16px; }
        .signature-gradient { background: linear-gradient(135deg, #003f87 0%, #0056b3 100%); }
        .btn-primary { background: #003f87; color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: none; width: 100%; cursor: pointer; transition: all 0.3s; }
        .btn-primary:hover { background: #002a5d; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0, 63, 135, 0.3); }
        .form-input { width: 100%; padding: 12px 16px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 14px; transition: all 0.3s; }
        .form-input:focus { outline: none; border-color: #003f87; box-shadow: 0 0 0 3px rgba(0, 63, 135, 0.15); }
        @media (max-width: 640px) {
            .form-card { padding: 24px 20px !important; }
            h2 { font-size: 1.3rem !important; }
            .brand-side { display: none !important; }
            .login-container { border-radius: 16px !important; }
            .form-input { font-size: 16px !important; padding: 14px 16px !important; }
        }
        @media (min-width: 641px) {
            .brand-side { display: flex !important; }
        }
    </style>
</head>
<body>

    <div class="login-container flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-3xl overflow-hidden shadow-2xl" style="border-radius: 24px;">

        <!-- Left side - Branding -->
        <div class="brand-side flex-1 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-8 md:p-12 flex flex-col justify-between text-white" style="display: none;">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold mb-2">YA Consulting</h1>
                <p class="opacity-70 text-sm">Solutions professionnelles</p>
            </div>
            <div>
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Inscription</h2>
                <p class="opacity-70 text-sm">Créez votre compte pour accéder à la plateforme</p>
            </div>
            <p class="text-xs opacity-50">&copy; 2026 YA Consulting</p>
        </div>

        <!-- Right side - Form -->
        <div class="form-card flex-1 p-6 md:p-12" style="padding: 24px;">
            <h2 class="text-xl md:text-2xl font-bold text-[#1a1a2e] mb-2">Créer un compte</h2>
            <p class="text-gray-500 text-sm mb-6">Remplissez le formulaire ci-dessous</p>

            @if($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-50 text-red-600 text-sm">
                    @foreach($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Nom complet</label>
                    <input type="text" name="name" class="form-input" placeholder="Jean Dupont" required value="{{ old('name') }}">
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Adresse e-mail</label>
                    <input type="email" name="email" class="form-input" placeholder="nom@exemple.com" required value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Mot de passe</label>
                    <input type="password" name="password" class="form-input" placeholder="********" required>
                </div>

                <div class="mb-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="********" required>
                </div>

                <button type="submit" class="btn-primary">
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