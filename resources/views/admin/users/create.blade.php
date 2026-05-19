@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-on-surface tracking-tight">Ajouter un utilisateur</h2>
            <p class="text-on-surface-variant text-sm mt-1">Créez un nouveau compte utilisateur</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            Retour
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
        <form action="{{ route('admin.users.store') }}" method="POST" class="p-8 space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Nom complet *</label>
                <input type="text" name="name" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-primary focus:outline-none" value="{{ old('name') }}" required>
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Email *</label>
                <input type="email" name="email" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-primary focus:outline-none" value="{{ old('email') }}" required>
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Mot de passe *</label>
                <input type="password" name="password" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-primary focus:outline-none" required>
                @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Confirmer le mot de passe *</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-primary focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-on-surface mb-2">Rôle *</label>
                <select name="role" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-primary focus:outline-none">
                    <option value="technicien">👨‍🔧 Technicien</option>
                    <option value="manager">📊 Manager</option>
                    <option value="admin">👑 Administrateur</option>
                </select>
                @error('role') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">Annuler</a>
                <button type="submit" class="px-6 py-2 signature-gradient text-white rounded-lg font-semibold">Créer l'utilisateur</button>
            </div>
        </form>
    </div>
</div>
@endsection