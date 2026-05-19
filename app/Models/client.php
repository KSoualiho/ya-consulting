<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'nom_entreprise', 'contact', 'telephone', 'email', 'adresse', 'code_postal', 'ville'
    ];

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }
}