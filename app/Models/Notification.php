<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'intervention_id', 'type', 'titre', 
        'message', 'lue', 'email_envoye', 'date_envoi', 'date_rappel'
    ];

    protected $casts = [
        'lue' => 'boolean',
        'email_envoye' => 'boolean',
        'date_envoi' => 'datetime',
        'date_rappel' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function intervention()
    {
        return $this->belongsTo(Intervention::class);
    }

    public function scopeNonLues($query)
    {
        return $query->where('lue', false);
    }

    public function scopeParType($query, $type)
    {
        return $query->where('type', $type);
    }
}
