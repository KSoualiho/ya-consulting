@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-pencil-square"></i> Modifier l'intervention</h2>
        <a href="{{ route('interventions.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('interventions.update', $intervention) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Client *</label>
                        <select name="client_id" class="form-control" required>
                            <option value="">Sélectionner un client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $intervention->client_id == $client->id ? 'selected' : '' }}>
                                    {{ $client->nom_entreprise }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Type d'intervention *</label>
                        <input type="text" name="type_intervention" class="form-control" value="{{ $intervention->type_intervention }}" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Description *</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $intervention->description }}</textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Date et heure</label>
                        <input type="datetime-local" name="date_heure" class="form-control" value="{{ $intervention->date_heure ? date('Y-m-d\TH:i', strtotime($intervention->date_heure)) : '' }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Technicien</label>
                        <select name="technicien_id" class="form-control">
                            <option value="">Non assigné</option>
                            @foreach($techniciens as $technicien)
                                <option value="{{ $technicien->id }}" {{ $intervention->technicien_id == $technicien->id ? 'selected' : '' }}>
                                    {{ $technicien->nom }} ({{ $technicien->specialite ?? 'Polyvalent' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Priorité *</label>
                        <select name="priorite" class="form-control" required>
                            <option value="basse" {{ $intervention->priorite == 'basse' ? 'selected' : '' }}>Basse</option>
                            <option value="moyenne" {{ $intervention->priorite == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                            <option value="haute" {{ $intervention->priorite == 'haute' ? 'selected' : '' }}>Haute</option>
                            <option value="urgente" {{ $intervention->priorite == 'urgente' ? 'selected' : '' }}>Urgente</option>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Enregistrer
                    </button>
                    <a href="{{ route('interventions.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection