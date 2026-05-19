@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1>Ajouter un technicien</h1>
    <p>Créez un nouveau profil technique pour votre équipe de terrain.</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('techniciens.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Nom complet *</label>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" 
                           placeholder="Jean Dupont" required value="{{ old('nom') }}">
                    @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                           placeholder="jean.dupont@example.com" value="{{ old('email') }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" name="telephone" class="form-control @error('telephone') is-invalid @enderror" 
                           placeholder="01 23 45 67 89" value="{{ old('telephone') }}">
                    @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">Spécialité</label>
                    <select name="specialite" class="form-control @error('specialite') is-invalid @enderror">
                        <option value="">-- Sélectionner --</option>
                        <option value="Électricité" {{ old('specialite') == 'Électricité' ? 'selected' : '' }}>⚡ Électricité</option>
                        <option value="Plomberie" {{ old('specialite') == 'Plomberie' ? 'selected' : '' }}>💧 Plomberie</option>
                        <option value="Chauffage" {{ old('specialite') == 'Chauffage' ? 'selected' : '' }}>🔥 Chauffage</option>
                        <option value="Climatisation" {{ old('specialite') == 'Climatisation' ? 'selected' : '' }}>❄️ Climatisation</option>
                        <option value="Informatique" {{ old('specialite') == 'Informatique' ? 'selected' : '' }}>💻 Informatique</option>
                        <option value="Polyvalent" {{ old('specialite') == 'Polyvalent' ? 'selected' : '' }}>🔧 Polyvalent</option>
                    </select>
                    @error('specialite') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-12 mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="actif" class="form-check-input" id="actif" checked value="1">
                        <label class="form-check-label" for="actif">Technicien actif</label>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 20px;">
                <a href="{{ route('techniciens.index') }}" class="btn btn-outline">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer le technicien</button>
            </div>
        </form>
    </div>
</div>
@endsection