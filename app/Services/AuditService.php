<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditService
{
    /**
     * Enregistrer une activité
     */
    public static function log($action, $modelType, $modelId, $description = null, $oldValues = null, $newValues = null, $interventionId = null)
    {
        try {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'intervention_id' => $interventionId,
                'action' => $action,
                'model_type' => $modelType,
                'model_id' => $modelId,
                'old_values' => $oldValues ? json_encode($oldValues) : null,
                'new_values' => $newValues ? json_encode($newValues) : null,
                'description' => $description ?? self::generateDescription($action, $modelType),
                'ip_address' => Request::ip()
            ]);
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'enregistrement du log audit: ' . $e->getMessage());
        }
    }
    
    /**
     * Générer une description lisible
     */
    private static function generateDescription($action, $modelType)
    {
        $descriptions = [
            'create' => "Création de $modelType",
            'update' => "Modification de $modelType",
            'delete' => "Suppression de $modelType",
            'assign' => "Assignation de $modelType",
            'status_change' => "Changement de statut de $modelType",
            'validate' => "Validation de $modelType",
        ];
        
        return $descriptions[$action] ?? "{$action} sur {$modelType}";
    }
    
    /**
     * Enregistrer un changement d'intervention
     */
    public static function logInterventionChange($intervention, $action, $oldData = null, $newData = null)
    {
        $description = match($action) {
            'create' => "Intervention {$intervention->numero} créée",
            'update' => "Intervention {$intervention->numero} modifiée",
            'assign' => "Technicien assigné à l'intervention {$intervention->numero}",
            'status_change' => "Statut de {$intervention->numero} changé en {$intervention->statut}",
            'delete' => "Intervention {$intervention->numero} supprimée",
            default => "Intervention {$intervention->numero} modifiée"
        };
        
        self::log($action, 'Intervention', $intervention->id, $description, $oldData, $newData, $intervention->id);
    }
    
    /**
     * Enregistrer un changement de rapport
     */
    public static function logRapportChange($rapport, $action, $oldData = null, $newData = null)
    {
        $description = match($action) {
            'create' => "Rapport d'intervention {$rapport->intervention->numero} créé",
            'update' => "Rapport d'intervention {$rapport->intervention->numero} modifié",
            'validate' => "Rapport d'intervention {$rapport->intervention->numero} validé",
            'delete' => "Rapport d'intervention {$rapport->intervention->numero} supprimé",
            default => "Rapport modifié"
        };
        
        self::log($action, 'Rapport', $rapport->id, $description, $oldData, $newData, $rapport->intervention_id);
    }
}
