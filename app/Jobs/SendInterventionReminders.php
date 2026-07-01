<?php

namespace App\Jobs;

use App\Models\Intervention;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class SendInterventionReminders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Trouver les interventions programmées dans les 2 prochaines heures
        $now = Carbon::now();
        $in2Hours = $now->copy()->addHours(2);
        
        $interventions = Intervention::whereBetween('date_heure', [$now, $in2Hours])
            ->whereIn('statut', ['planifiee', 'en_cours'])
            ->with(['technicien', 'client'])
            ->get();
        
        foreach ($interventions as $intervention) {
            // Vérifier qu'on n'a pas déjà envoyé le rappel
            $reminderExists = \DB::table('notifications')
                ->where('intervention_id', $intervention->id)
                ->where('type', 'rappel_rapport')
                ->where('created_at', '>=', $now->copy()->subHours(3))
                ->exists();
            
            if (!$reminderExists && $intervention->technicien_id) {
                // Envoyer le rappel au technicien
                NotificationService::interventionReminder(
                    $intervention->technicien_id,
                    $intervention
                );
            }
        }
    }
}
