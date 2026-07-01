<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\EncryptionService;

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
    
    // ========== ACCESSORS (Déchiffrer en lecture) ==========
    
    /**
     * Déchiffrer le téléphone
     */
    public function getTelephoneAttribute($value)
    {
        return EncryptionService::decrypt($value);
    }
    
    /**
     * Déchiffrer l'adresse
     */
    public function getAdresseAttribute($value)
    {
        return EncryptionService::decrypt($value);
    }
    
    /**
     * Déchiffrer le code postal
     */
    public function getCodePostalAttribute($value)
    {
        return EncryptionService::decrypt($value);
    }
    
    // ========== MUTATORS (Chiffrer en écriture) ==========
    
    /**
     * Chiffrer le téléphone avant sauvegarde
     */
    public function setTelephoneAttribute($value)
    {
        if ($value && !EncryptionService::isEncrypted($value)) {
            $this->attributes['telephone'] = EncryptionService::encrypt($value);
        } else {
            $this->attributes['telephone'] = $value;
        }
    }
    
    /**
     * Chiffrer l'adresse avant sauvegarde
     */
    public function setAdresseAttribute($value)
    {
        if ($value && !EncryptionService::isEncrypted($value)) {
            $this->attributes['adresse'] = EncryptionService::encrypt($value);
        } else {
            $this->attributes['adresse'] = $value;
        }
    }
    
    /**
     * Chiffrer le code postal avant sauvegarde
     */
    public function setCodePostalAttribute($value)
    {
        if ($value && !EncryptionService::isEncrypted($value)) {
            $this->attributes['code_postal'] = EncryptionService::encrypt($value);
        } else {
            $this->attributes['code_postal'] = $value;
        }
    }
}