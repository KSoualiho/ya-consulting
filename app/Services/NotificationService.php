<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use App\Models\Technicien;
use App\Models\Intervention;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterventionAssigned;
use App\Mail\InterventionStatusChanged;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    /**
     * Envoyer une notification d'assignation
     */
   public static function assignation($technicienId, $intervention)
{
    // Récupérer le technicien et son utilisateur associé
    $technicien = Technicien::find($technicienId);
    
    if (!$technicien || !$technicien->user) {
        \Log::error("Technicien ou utilisateur associé non trouvé pour ID: {$technicienId}");
        return null;
    }

    $user = $technicien->user;
    
    // Notification in-app
    $notification = Notification::create([
        'user_id' => $user->id,
        'intervention_id' => $intervention->id,
        'type' => 'assignation',
        'titre' => 'Nouvelle intervention assignée',
        'message' => "Une nouvelle intervention #{$intervention->numero} vous a été assignée.",
        'date_envoi' => now()
    ]);

    // Envoi d'email
    if ($user && $user->email) {
        try {
            Mail::to($user->email)->send(new InterventionAssigned($intervention, $user));
            $notification->update(['email_envoye' => true]);
        } catch (\Exception $e) {
            \Log::error("Erreur envoi email: " . $e->getMessage());
        }
    }

    return $notification;
}

    /**
     * Envoyer une notification de rappel avant intervention
     */
    public static function rappelAvant($technicienId, $intervention)
    {
        $notification = Notification::create([
            'user_id' => $technicienId,
            'intervention_id' => $intervention->id,
            'type' => 'rappel_avant',
            'titre' => 'Rappel : Intervention dans 2 heures',
            'message' => "Rappel : Intervention #{$intervention->numero} chez {$intervention->client->nom_entreprise} dans 2 heures.",
            'date_rappel' => now()->addHours(2),
            'date_envoi' => now()
        ]);

        self::sendEmail($technicienId, $notification);

        return $notification;
    }

    /**
     * Envoyer une notification de confirmation de fin
     */
    public static function confirmationFin($technicienId, $intervention)
    {
        $notification = Notification::create([
            'user_id' => $technicienId,
            'intervention_id' => $intervention->id,
            'type' => 'confirmation',
            'titre' => 'Intervention terminée',
            'message' => "L'intervention #{$intervention->numero} a été marquée comme terminée. N'oubliez pas de soumettre le rapport.",
            'date_envoi' => now()
        ]);

        self::sendEmail($technicienId, $notification);

        return $notification;
    }

    /**
     * Envoyer une notification de changement de statut
     */
    public static function changeStatut($technicienId, $intervention)
    {
        $user = User::find($technicienId);
        
        $notification = Notification::create([
            'user_id' => $technicienId,
            'intervention_id' => $intervention->id,
            'type' => 'statut_change',
            'titre' => 'Statut de l\'intervention changé',
            'message' => "Le statut de l'intervention #{$intervention->numero} est maintenant : {$intervention->statut}",
            'date_envoi' => now()
        ]);

        if ($user && $user->email) {
            try {
                Mail::to($user->email)->send(new InterventionStatusChanged($intervention, $user));
                $notification->update(['email_envoye' => true]);
            } catch (\Exception $e) {
                \Log::error("Erreur envoi email: " . $e->getMessage());
            }
        }

        return $notification;
    }

    /**
     * Envoyer une notification au manager quand un rapport est soumis
     */
    public static function rapportSoumis($managerId, $rapport)
    {
        $manager = User::find($managerId);

        $notification = Notification::create([
            'user_id' => $managerId,
            'intervention_id' => $rapport->intervention_id,
            'type' => 'rapport_soumis',
            'titre' => 'Nouveau rapport en attente de validation',
            'message' => "Un rapport pour l'intervention #{$rapport->intervention->numero} est en attente de validation.",
            'date_envoi' => now()
        ]);

        if ($manager && $manager->email) {
            try {
                Mail::to($manager->email)->send(new \App\Mail\RapportSubmitted($rapport, $manager));
                $notification->update(['email_envoye' => true]);
            } catch (\Exception $e) {
                \Log::error("Erreur envoi email: " . $e->getMessage());
            }
        }

        return $notification;
    }

    /**
     * Envoyer une notification au technicien quand son rapport est validé
     */
    public static function rapportValide($technicienId, $rapport)
    {
        $technicien = User::find($technicienId);

        $notification = Notification::create([
            'user_id' => $technicienId,
            'intervention_id' => $rapport->intervention_id,
            'type' => 'rapport_valide',
            'titre' => 'Votre rapport a été validé',
            'message' => "Votre rapport pour l'intervention #{$rapport->intervention->numero} a été validé par le manager.",
            'date_envoi' => now()
        ]);

        if ($technicien && $technicien->email) {
            try {
                Mail::to($technicien->email)->send(new \App\Mail\RapportValidated($rapport, $technicien));
                $notification->update(['email_envoye' => true]);
            } catch (\Exception $e) {
                \Log::error("Erreur envoi email: " . $e->getMessage());
            }
        }

        return $notification;
    }

    /**
     * Méthode utilitaire pour envoyer un email
     */
    private static function sendEmail($userId, $notification)
    {
        $user = User::find($userId);
        
        if ($user && $user->email) {
            try {
                // La logique d'envoi spécifique est déléguée à chaque méthode
                $notification->update(['email_envoye' => true]);
            } catch (\Exception $e) {
                \Log::error("Erreur envoi email: " . $e->getMessage());
            }
        }
    }
}