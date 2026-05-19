<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle intervention</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #003f87 0%, #0056b3 100%); color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9f9ff; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
        .button { background: #003f87; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; }
        .info { margin: 15px 0; padding: 10px; background: white; border-left: 4px solid #003f87; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>YA Consulting</h2>
            <p>Gestion des interventions</p>
        </div>
        <div class="content">
            <h3>Bonjour {{ $technicien->name }},</h3>
            <p>Une nouvelle intervention vous a été assignée.</p>
            
            <div class="info">
                <p><strong>Intervention :</strong> {{ $intervention->numero }}</p>
                <p><strong>Client :</strong> {{ $intervention->client?->nom_entreprise ?? 'N/A' }}</p>
                <p><strong>Type :</strong> {{ $intervention->type_intervention }}</p>
                <p><strong>Priorité :</strong> {{ $intervention->priorite }}</p>
                <p><strong>Date :</strong> {{ $intervention->date_heure ? date('d/m/Y H:i', strtotime($intervention->date_heure)) : 'Non planifiée' }}</p>
            </div>
            
            <p style="text-align: center;">
                <a href="{{ route('interventions.show', $intervention) }}" class="button">Voir l'intervention</a>
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} YA Consulting - Tous droits réservés</p>
            <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
        </div>
    </div>
</body>
</html>