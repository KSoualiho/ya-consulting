<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport d'intervention</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #003f87;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #003f87;
            margin: 0;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            background: #f0f0f0;
            padding: 8px 12px;
            font-weight: bold;
            border-left: 4px solid #003f87;
            margin-bottom: 15px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            width: 150px;
            font-weight: bold;
        }
        .info-value {
            flex: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f5f5f5;
        }
        .signature {
            margin-top: 40px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>YA Consulting</h1>
        <p>Gestion des interventions techniques</p>
        <p><strong>Rapport d'intervention</strong></p>
        <p>{{ $rapport->intervention->numero }}</p>
    </div>

    <div class="section">
        <div class="section-title">📋 INFORMATIONS GÉNÉRALES</div>
        <div class="info-row">
            <div class="info-label">Client :</div>
            <div class="info-value">{{ $rapport->intervention->client->nom_entreprise ?? 'N/A' }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Contact :</div>
            <div class="info-value">{{ $rapport->intervention->client->contact ?? 'N/A' }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Adresse :</div>
            <div class="info-value">{{ $rapport->intervention->client->adresse ?? 'Non renseignée' }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Téléphone :</div>
            <div class="info-value">{{ $rapport->intervention->client->telephone ?? 'N/A' }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Date d'intervention :</div>
            <div class="info-value">{{ $rapport->created_at->format('d/m/Y H:i') }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">🔧 DÉTAILS DE L'INTERVENTION</div>
        <div class="info-row">
            <div class="info-label">Type :</div>
            <div class="info-value">{{ $rapport->intervention->type_intervention }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Priorité :</div>
            <div class="info-value">{{ $rapport->intervention->priorite }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Statut :</div>
            <div class="info-value">{{ $rapport->intervention->statut }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Technicien :</div>
            <div class="info-value">{{ $rapport->intervention->technicien->nom ?? 'Non assigné' }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">📝 DESCRIPTION DU PROBLÈME</div>
        <p>{{ $rapport->description ?: 'Aucune description' }}</p>
    </div>

    <div class="section">
        <div class="section-title">✅ ACTIONS RÉALISÉES</div>
        <p>{{ $rapport->actions_realisees ?: 'Non renseignées' }}</p>
    </div>

    <div class="section">
        <div class="section-title">🔩 PIÈCES UTILISÉES</div>
        <p>{{ $rapport->pieces_utilisees ?: 'Aucune pièce utilisée' }}</p>
    </div>

    <div class="section">
        <div class="section-title">⏱️ DURÉE</div>
        <p>{{ $rapport->duree_minutes }} minutes ({{ floor($rapport->duree_minutes / 60) }}h {{ $rapport->duree_minutes % 60 }}min)</p>
    </div>

    @if($rapport->satisfaction_client)
    <div class="section">
        <div class="section-title">⭐ SATISFACTION CLIENT</div>
        <p>
            @for($i = 1; $i <= 5; $i++)
                @if($i <= $rapport->satisfaction_client)
                    ★
                @else
                    ☆
                @endif
            @endfor
            ({{ $rapport->satisfaction_client }}/5)
        </p>
    </div>
    @endif

    @if($rapport->valide)
    <div class="signature">
        <div class="info-row">
            <div class="info-label">Validé par :</div>
            <div class="info-value">{{ $rapport->valide_par ? App\Models\User::find($rapport->valide_par)->name : 'Manager' }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Date de validation :</div>
            <div class="info-value">{{ $rapport->date_validation ? date('d/m/Y H:i', strtotime($rapport->date_validation)) : '-' }}</div>
        </div>
    </div>
    @endif

    @if($rapport->signature_client)
    <div class="section">
        <div class="section-title">✍️ SIGNATURE DU CLIENT</div>
        <div style="border: 1px solid #ddd; padding: 20px; text-align: center;">
            <img src="{{ $rapport->signature_client }}" style="max-height: 100px; max-width: 100%;">
        </div>
    </div>
    @endif

    <div class="footer">
        <p>Document généré automatiquement par YA Consulting - {{ date('d/m/Y H:i') }}</p>
    </div>
</body>
</html>