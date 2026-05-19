<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    protected $table = 'techniciens';
    protected $fillable = ['user_id', 'nom', 'telephone', 'specialite', 'email', 'actif'];

    // Relation avec User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation avec les interventions
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'technicien_id');
    }

    // Calculer la charge de travail (nombre d'interventions en cours)
    public function getChargeAttribute()
    {
        $total = $this->interventions()->count();
        $max = 10; // Maximum d'interventions par technicien
        return $total > 0 ? round(($total / $max) * 100) : 0;
    }

    // Interventions en cours
    public function interventionsEnCours()
    {
        return $this->interventions()->where('statut', 'en_cours')->get();
    }

    // Interventions planifiées
    public function interventionsPlanifiees()
    {
        return $this->interventions()->where('statut', 'planifiee')->orderBy('date_heure')->get();
    }
}