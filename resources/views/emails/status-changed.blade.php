<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Changement de statut</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #003f87 0%, #0056b3 100%); color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9f9ff; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
        .button { background: #003f87; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; }
        .status { display: inline-block; padding: 5px 10px; border-radius: 5px; font-weight: bold; }
        .status-terminee { background: #28a745; color: white; }
        .status-en_cours { background: #007bff; color: white; }
        .status-annulee { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>YA Consulting</h2>
            <p>Gestion des interventions</p>
        </div>
        <div class="content">
            <h3>Bonjour,</h3>
            <p>Le statut de l'intervention <strong>{{ $intervention->numero }}</strong> a changé.</p>
            
            <div class="info">
                <p><strong>Client :</strong> {{ $intervention->client?->nom_entreprise ?? 'N/A' }}</p>
                <p><strong>Nouveau statut :</strong> 
                    <span class="status status-{{ $intervention->statut }}">{{ $intervention->statut }}</span>
                </p>
            </div>
            
            <p style="text-align: center;">
                <a href="{{ route('interventions.show', $intervention) }}" class="button">Voir l'intervention</a>
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} YA Consulting - Tous droits réservés</p>
        </div>
    </div>
</body>
</html>