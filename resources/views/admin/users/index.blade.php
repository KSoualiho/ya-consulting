<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Azure Meridian - Gestion des utilisateurs</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
        .signature-gradient {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 100%);
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased">
    <!-- Bouton menu hamburger -->
<button onclick="toggleMenu()" class="menu-toggle">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<script>
    function toggleMenu() {
        document.querySelector('.sidebar').classList.toggle('open');
    }
</script>

<!-- SideNavBar - IDENTIQUE À TA MAQUETTE -->
<aside class="h-screen w-64 fixed left-0 top-0 z-50 bg-[#f2f3fc] dark:bg-slate-900 flex flex-col p-6 space-y-2 font-['Inter'] text-sm font-medium tracking-wide">
    <div class="flex items-center space-x-3 mb-10 px-2">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003f87] to-[#0056b3] flex items-center justify-center text-white shadow-md">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">landscape</span>
        </div>
        <div>
            <h1 class="text-lg font-black text-[#191c21] dark:text-white leading-tight">YA Consulting</h1>
            <p class="text-[10px] uppercase tracking-widest text-[#424752] opacity-70">Gestion d'interventions</p>
        </div>
    </div>
    
    <nav class="flex-grow space-y-1">
        <a class="flex items-center gap-3 px-4 py-3 text-[#424752] hover:bg-[#ededf6] rounded-lg transition-all duration-200" href="{{ route('dashboard') }}">
    <span class="material-symbols-outlined">dashboard</span>
    <span>Tableau de Bord</span>
</a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('clients.index') }}">
            <span class="material-symbols-outlined">group</span>
            <span>Clients</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('interventions.index') }}">
            <span class="material-symbols-outlined">engineering</span>
            <span>Interventions</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('techniciens.index') }}">
            <span class="material-symbols-outlined">badge</span>
            <span>Techniciens</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('rapports.index') }}">
            <span class="material-symbols-outlined">description</span>
            <span>Rapports</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('statistiques.index') }}">
            <span class="material-symbols-outlined">monitoring</span>
            <span>Statistiques</span>
        </a>
        <a class="flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-[#003f87] hover:translate-x-1 duration-300 transition-all" href="{{ route('planning.index') }}">
            <span class="material-symbols-outlined">calendar_month</span>
            <span>Planning</span>
        </a>
         <!-- AJOUTE ICI LE LIEN ADMINISTRATION -->
    @if(auth()->user()->role === 'admin')
    <a class="flex items-center gap-3 px-4 py-3 bg-gradient-to-br from-[#003f87] to-[#0056b3] text-white rounded-lg shadow-lg transition-all duration-200" href="{{ route('admin.users.index') }}">
    <span class="material-symbols-outlined">admin_panel_settings</span>
    <span>Administration</span>
</a>
    @endif
    </nav>
    
    <div class="mt-auto pt-6 space-y-1">
        <a href="{{ route('interventions.create') }}" class="w-full flex items-center justify-center space-x-2 py-3 mb-4 bg-[#003f87] text-white rounded-lg font-bold text-xs uppercase tracking-widest hover:bg-[#0056b3] transition-colors shadow-sm">
            <span class="material-symbols-outlined text-sm">add</span>
            <span>Nouvelle Intervention</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center space-x-3 p-3 text-[#424752] hover:bg-[#ededf6] hover:text-error transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span>Déconnexion</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="ml-64 min-h-screen p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-on-surface tracking-tight">Gestion des utilisateurs</h2>
                <p class="text-on-surface-variant text-sm mt-1">Supervisez et gérez les droits d'accès</p>
            </div>
            <a href="{{ route('admin.users.create') }}" class="signature-gradient text-white px-6 py-3 rounded-xl font-semibold flex items-center gap-2 shadow-lg shadow-primary/20 active:scale-95 transition-transform">
                <span class="material-symbols-outlined">add</span>
                Nouvel utilisateur
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">{{ session('error') }}</div>
        @endif

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-primary">
                <p class="text-xs font-bold text-on-surface-variant uppercase">Total utilisateurs</p>
                <p class="text-3xl font-black text-on-surface mt-2">{{ $users->total() }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-green-500">
                <p class="text-xs font-bold text-on-surface-variant uppercase">Techniciens</p>
                <p class="text-3xl font-black text-on-surface mt-2">{{ $techniciensCount ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500">
                <p class="text-xs font-bold text-on-surface-variant uppercase">Managers</p>
                <p class="text-3xl font-black text-on-surface mt-2">{{ $managersCount ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-red-500">
                <p class="text-xs font-bold text-on-surface-variant uppercase">Administrateurs</p>
                <p class="text-3xl font-black text-on-surface mt-2">{{ $adminsCount ?? 0 }}</p>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-gray-500">ID</th>
                            <th class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-gray-500">Nom</th>
                            <th class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-gray-500">Email</th>
                            <th class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-gray-500">Rôle</th>
                            <th class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-gray-500">Date</th>
                            <th class="px-6 py-4 text-[11px] font-black uppercase tracking-widest text-gray-500 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-bold">#{{ $user->id }}</a>
                            <td class="px-6 py-4">{{ $user->name }}</a>
                            <td class="px-6 py-4">{{ $user->email }}</a>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-bold 
                                    @if($user->role == 'admin') bg-red-100 text-red-700
                                    @elseif($user->role == 'manager') bg-blue-100 text-blue-700
                                    @else bg-green-100 text-green-700
                                    @endif">
                                    {{ $user->role }}
                                </span>
                            </a>
                            <td class="px-6 py-4">{{ $user->created_at->format('d/m/Y') }}</a>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 text-gray-500 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-500 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </a>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</main>

</body>
</html>