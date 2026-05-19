<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Connexion | YA Consulting</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "error-container": "#ffdad6",
                        "background": "#f9f9ff",
                        "on-error-container": "#93000a",
                        "primary": "#003f87",
                        "on-error": "#ffffff",
                        "tertiary-container": "#983c00",
                        "on-primary-fixed-variant": "#004491",
                        "error": "#ba1a1a",
                        "surface-container": "#ededf6",
                        "surface-bright": "#f9f9ff",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#d7e2ff",
                        "on-tertiary-fixed": "#351000",
                        "tertiary-fixed": "#ffdbcc",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-container": "#bbd0ff",
                        "tertiary-fixed-dim": "#ffb694",
                        "surface-variant": "#e1e2ea",
                        "inverse-on-surface": "#f0f0f9",
                        "surface": "#f9f9ff",
                        "secondary": "#4c5e84",
                        "surface-container-highest": "#e1e2ea",
                        "secondary-container": "#bfd2fd",
                        "inverse-primary": "#acc7ff",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed": "#001a40",
                        "on-primary": "#ffffff",
                        "surface-container-high": "#e7e8f0",
                        "surface-dim": "#d9d9e2",
                        "primary-fixed": "#d7e2ff",
                        "inverse-surface": "#2e3037",
                        "outline": "#727784",
                        "on-secondary-container": "#475a7f",
                        "surface-tint": "#115cb9",
                        "on-secondary-fixed-variant": "#34476a",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "secondary-fixed-dim": "#b3c7f1",
                        "primary-container": "#0056b3",
                        "on-surface-variant": "#424752",
                        "surface-container-low": "#f2f3fc",
                        "tertiary": "#722b00",
                        "on-tertiary-container": "#ffc2a7",
                        "primary-fixed-dim": "#acc7ff",
                        "on-surface": "#191c21",
                        "on-secondary-fixed": "#041b3c",
                        "outline-variant": "#c2c6d4",
                        "on-background": "#191c21"
                    },
                    fontFamily: {
                        "headline": ["Inter"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
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
            box-shadow: 0 8px 40px rgba(25, 28, 33, 0.06);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface-variant min-h-screen flex flex-col items-center justify-center p-6 selection:bg-secondary-container selection:text-on-secondary-container">

<main class="w-full max-w-md">
    <!-- Brand Logo Anchor -->
    <div class="mb-12 text-center">
        <h1 class="text-2xl font-bold tracking-tight text-primary font-headline">YA Consulting</h1>
        <p class="text-sm text-on-surface-variant mt-2">Architectural Minimalist</p>
    </div>
    
    <!-- Centered Focus Panel -->
    <div class="bg-surface-container-lowest p-10 xl:rounded-xl ambient-shadow w-full">
        <header class="mb-8">
            <h2 class="text-3xl font-bold text-on-surface tracking-tight mb-2 font-headline">Bienvenue !</h2>
            <p class="text-on-surface-variant text-sm tracking-wide font-medium">VEUILLEZ VOUS IDENTIFIER POUR CONTINUER</p>
        </header>
        
        <!-- Affichage des erreurs -->
        @if($errors->any())
            <div class="mb-4 p-3 rounded-lg" style="background: #ffdad6; color: #93000a;">
                @foreach($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <!-- Formulaire Laravel -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            <!-- Input Group: Email -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold tracking-[0.05em] text-on-surface-variant uppercase font-label" for="email">
                    Adresse e-mail
                </label>
                <div class="relative group">
                    <input class="w-full bg-surface-container-low border-none focus:ring-1 focus:ring-primary rounded-xl px-4 py-3 text-on-surface transition-all duration-200 placeholder:text-outline/50" 
                           id="email" name="email" placeholder="nom@exemple.com" type="email" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            
            <!-- Input Group: Password -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold tracking-[0.05em] text-on-surface-variant uppercase font-label" for="password">
                    Mot de passe
                </label>
                <div class="relative group">
                    <input class="w-full bg-surface-container-low border-none focus:ring-1 focus:ring-primary rounded-xl px-4 py-3 text-on-surface transition-all duration-200 placeholder:text-outline/50" 
                           id="password" name="password" placeholder="••••••••" type="password" required>
                </div>
            </div>
            
            <!-- Primary Action -->
            <div class="pt-4">
                <button class="w-full signature-gradient text-on-primary font-semibold py-4 rounded-xl shadow-lg hover:brightness-110 active:scale-[0.98] transition-all duration-200 tracking-wide" type="submit">
                    Se connecter
                </button>
            </div>
        </form>
        
        <!-- Secondary Actions -->
        <div class="mt-8 text-center space-y-4">
            <a class="inline-block text-sm font-medium text-primary hover:text-primary-container transition-colors" href="#">
                Mot de passe oublié ?
            </a>
            <div class="flex items-center justify-center gap-2 pt-4">
                <span class="text-sm text-on-surface-variant">Pas encore de compte ?</span>
                <a href="{{ route('register') }}" class="text-[#003f87] font-semibold hover:underline">
    S'inscrire
</a>
            </div>
        </div>
    </div>
    
    <!-- Background Decoration -->
    <div class="fixed top-0 left-0 w-full h-full -z-10 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-surface-container-low/40 blur-[120px]"></div>
        <div class="absolute bottom-[-5%] left-[-5%] w-[40%] h-[40%] rounded-full bg-secondary-container/10 blur-[100px]"></div>
    </div>
</main>

<!-- Footer -->
<footer class="mt-12 text-xs text-outline/60 font-medium tracking-wider flex gap-6">
    <span>© {{ date('Y') }} YA Consulting</span>
    <a class="hover:text-on-surface-variant transition-colors uppercase" href="#">Confidentialité</a>
    <a class="hover:text-on-surface-variant transition-colors uppercase" href="#">Conditions</a>
</footer>

</body>
</html>