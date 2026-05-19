<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport en attente de validation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #003f87 0%, #0056b3 100%); color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9f9ff; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #666; }
        .button { background: #003f87; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; }
        .info { margin: 15px 0; padding: 10px; background: white; border-left: 4px solid #003f87; }
        .alert { background: #fff3cd; border-left: 4px solid #ffc107; padding: 10px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>YA Consulting</h2>
            <p>Gestion des interventions</p>
        </div>
        <div class="content">
            <h3>Bonjour {{ $manager->name }},</h3>
            <p>Un nouveau rapport a été soumis et est en attente de votre validation.</p>
            
            <div class="alert">
                <strong>⚠️ Action requise</strong><br>
                Un rapport nécessite votre validation.
            </div>
            
            <div class="info">
                <p><strong>Intervention :</strong> {{ $rapport->intervention?->numero ?? 'N/A' }}</p>
                <p><strong>Client :</strong> {{ $rapport->intervention?->client?->nom_entreprise ?? 'N/A' }}</p>
                <p><strong>Technicien :</strong> {{ $rapport->intervention?->technicien?->nom ?? 'N/A' }}</p>
                <p><strong>Date de soumission :</strong> {{ date('d/m/Y H:i', strtotime($rapport->created_at)) }}</p>
            </div>

            <p><strong>Résumé du rapport :</strong></p>
            <p>{{ substr($rapport->contenu, 0, 200) }}</p>
            
            <p style="text-align: center;">
                <a href="{{ route('rapports.show', $rapport) }}" class="button">Voir et valider le rapport</a>
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} YA Consulting - Tous droits réservés</p>
            <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
        </div>
    </div>
</body>
</html>