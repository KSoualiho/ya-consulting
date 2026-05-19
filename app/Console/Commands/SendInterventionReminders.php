<?php

namespace App\Console\Commands;

use App\Models\Intervention;
use App\Models\User;
use App\Mail\InterventionReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

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
            ->get();
        
        foreach ($interventions as $intervention) {
            if ($intervention->technicien_id) {
                $technicien = User::find($intervention->technicien_id);
                if ($technicien && $technicien->email) {
                    Mail::to($technicien->email)->send(new InterventionReminder($intervention, $technicien));
                    $this->info("Rappel envoyé pour {$intervention->numero}");
                }
            }
        }
        
        $this->info("Rappels envoyés : " . $interventions->count());
    }
}