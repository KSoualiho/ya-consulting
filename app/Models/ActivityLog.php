<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';
    
    protected $fillable = [
        'user_id',
        'intervention_id',
        'action',
        'model_type',
        'model_id',
        'old_values',
        'new_values',
        'description',
        'ip_address'
    ];
    
    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function intervention()
    {
        return $this->belongsTo(Intervention::class);
    }
}
