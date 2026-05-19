@extends('layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>{{ $technicien->nom }}</h1>
        <p>Profil et interventions assignées</p>
    </div>
    <div>
        <a href="{{ route('techniciens.edit', $technicien) }}" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Modifier
        </a>
        <a href="{{ route('techniciens.index') }}" class="btn btn-outline">
            <i class="bi bi-arrow-left"></i> Retour
        </a>
    </div>
</div>

<div class="row">
    <!-- Informations technicien -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <div style="font-size: 4rem;">
                    <i class="bi bi-person-circle"></i>
                </div>
                <h3>{{ $technicien->nom }}</h3>
                <p class="text-muted">{{ $technicien->specialite ?? 'Polyvalent' }}</p>
                
                <hr>
                
                <div style="text-align: left;">
                    <p><i class="bi bi-envelope"></i> {{ $technicien->email ?: 'Non renseigné' }}</p>
                    <p><i class="bi bi-telephone"></i> {{ $technicien->telephone ?: 'Non renseigné' }}</p>
                    <p>
                        <i class="bi bi-check-circle"></i> 
                        @if($technicien->actif)
                            <span class="badge badge-success">Actif</span>
                        @else
                            <span class="badge badge-secondary">Inactif</span>
                        @endif
                    </p>
                </div>
                
                <hr>
                
                <div>
                    <div>Charge de travail</div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar" style="width: {{ $technicien->charge }}%; background: linear-gradient(90deg, #667eea, #764ba2);"></div>
                    </div>
                    <div class="mt-2">{{ $technicien->charge }}%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Interventions en cours -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">🔄 Interventions en cours</div>
            <div class="card-body">
                @if($interventionsEnCours->count() > 0)
                    @foreach($interventionsEnCours as $intervention)
                    <div class="activity-item">
                        <div><strong>{{ $intervention->numero }}</strong> - {{ $intervention->client->nom_entreprise ?? 'N/A' }}</div>
                        <div>{{ $intervention->type_intervention }}</div>
                        <div><small>Depuis le {{ $intervention->date_heure ? date('d/m/Y H:i', strtotime($intervention->date_heure)) : 'Non planifiée' }}</small></div>
                    </div>
                    @endforeach
                @else
                    <p class="text-muted">Aucune intervention en cours</p>
                @endif
            </div>
        </div>

        <!-- Interventions planifiées -->
        <div class="card mt-4">
            <div class="card-header">📅 Interventions planifiées</div>
            <div class="card-body">
                @if($interventionsPlanifiees->count() > 0)
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr><th>N°</th><th>Client</th><th>Type</th><th>Date</th><th>Priorité</th></tr>
                            </thead>
                            <tbody>
                                @foreach($interventionsPlanifiees as $intervention)
                                <tr>
                                    <td>{{ $intervention->numero }}</td>
                                    <td>{{ $intervention->client->nom_entreprise ?? 'N/A' }}</td>
                                    <td>{{ $intervention->type_intervention }}</td>
                                    <td>{{ $intervention->date_heure ? date('d/m/Y H:i', strtotime($intervention->date_heure)) : 'Non planifiée' }}</td>
                                    <td><span class="badge priority-{{ $intervention->priorite }}">{{ $intervention->priorite }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">Aucune intervention planifiée</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection