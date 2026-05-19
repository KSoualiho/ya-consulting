@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1>Modifier le technicien</h1>
    <p>Mettez à jour les informations du profil technique.</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('techniciens.update', $technicien) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Nom complet *</label>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" 
                           value="{{ old('nom', $technicien->nom) }}" required>
                    @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $technicien->email) }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" name="telephone" class="form-control @error('telephone') is-invalid @enderror" 
                           value="{{ old('telephone', $technicien->telephone) }}">
                    @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">Spécialité</label>
                    <select name="specialite" class="form-control @error('specialite') is-invalid @enderror">
                        <option value="">-- Sélectionner --</option>
                        <option value="Électricité" {{ old('specialite', $technicien->specialite) == 'Électricité' ? 'selected' : '' }}>⚡ Électricité</option>
                        <option value="Plomberie" {{ old('specialite', $technicien->specialite) == 'Plomberie' ? 'selected' : '' }}>💧 Plomberie</option>
                        <option value="Chauffage" {{ old('specialite', $technicien->specialite) == 'Chauffage' ? 'selected' : '' }}>🔥 Chauffage</option>
                        <option value="Climatisation" {{ old('specialite', $technicien->specialite) == 'Climatisation' ? 'selected' : '' }}>❄️ Climatisation</option>
                        <option value="Informatique" {{ old('specialite', $technicien->specialite) == 'Informatique' ? 'selected' : '' }}>💻 Informatique</option>
                        <option value="Polyvalent" {{ old('specialite', $technicien->specialite) == 'Polyvalent' ? 'selected' : '' }}>🔧 Polyvalent</option>
                    </select>
                    @error('specialite') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-12 mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="actif" class="form-check-input" id="actif" value="1" 
                               {{ old('actif', $technicien->actif) ? 'checked' : '' }}>
                        <label class="form-check-label" for="actif">Technicien actif</label>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 20px;">
                <a href="{{ route('techniciens.index') }}" class="btn btn-outline">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </div>
        </form>
    </div>
</div>
@endsection