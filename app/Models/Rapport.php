<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $table = 'rapports';
    protected $fillable = [
        'intervention_id', 'description', 'actions_realisees', 
        'pieces_utilisees', 'duree_minutes', 'photo_path', 
        'signature_client', 'valide', 'valide_par', 'date_validation'
    ];

    // Relation avec l'intervention
    public function intervention()
    {
        return $this->belongsTo(Intervention::class);
    }

    // Relation avec le validateur (manager)
    public function validateur()
    {
        return $this->belongsTo(User::class, 'valide_par');
    }

    // Vérifier si le rapport est validé
    public function estValide()
    {
        return $this->valide;
    }
}