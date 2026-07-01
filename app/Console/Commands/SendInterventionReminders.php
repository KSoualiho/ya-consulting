<?php

namespace App\Console\Commands;

use App\Models\Intervention;
use App\Models\User;
use App\Models\NotificationApp;
use App\Mail\InterventionReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon;

class SendInterventionReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Envoyer des rappels pour les interventions dans 2 heures';

    public function handle()
    {
        $now = now();
        $targetTime = $now->copy()->addHours(2);
        
        $interventions = Intervention::where('statut', 'planifiee')
            ->whereNotNull('date_heure')
            ->whereBetween('date_heure', [$now, $targetTime])
            ->with('technicien', 'client')
            ->get();
        
        foreach ($interventions as $intervention) {
            if ($intervention->technicien_id) {
                $technicien = User::find($intervention->technicien_id);
                if ($technicien && $technicien->email) {
                    // Vérifier qu'on n'a pas déjà envoyé un rappel récemment (dernières 3 heures)
                    $reminderExists = DB::table('notifications')
                        ->where('intervention_id', $intervention->id)
                        ->where('type', 'rappel_rapport')
                        ->where('created_at', '>=', $now->copy()->subHours(3))
                        ->exists();
                    
                    if (!$reminderExists) {
                        // Envoyer l'email
                        Mail::to($technicien->email)->send(new InterventionReminder($intervention, $technicien));
                        
                        // Créer la notification en BD
                        NotificationApp::create([
                            'user_id' => $technicien->id,
                            'intervention_id' => $intervention->id,
                            'type' => 'rappel_rapport',
                            'titre' => 'Rappel intervention',
                            'message' => "Rappel: {$intervention->numero} - {$intervention->client->nom_entreprise ?? 'N/A'} dans 2 heures",
                            'lue' => false,
                            'email_envoye' => true,
                            'date_envoi' => $now
                        ]);
                        
                        $this->info("Rappel envoyé pour {$intervention->numero} à {$technicien->name}");
                    }
                }
            }
        }
        
        $this->info("Rappels traités : " . $interventions->count());
    }
}