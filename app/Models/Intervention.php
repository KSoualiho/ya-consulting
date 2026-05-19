<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = 'interventions';
    protected $fillable = [
        'numero', 'client_id', 'type_intervention', 'description', 
        'date_heure', 'technicien_id', 'priorite', 'statut', 'created_by'
    ];

    // Relation avec Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // Relation avec Technicien
    public function technicien()
    {
        return $this->belongsTo(Technicien::class, 'technicien_id');
    }
    // Relation avec Rapport
    public function rapport()
{
    return $this->hasOne(Rapport::class);
}

public function aRapport()
{
    return $this->rapport()->exists();
}
}
