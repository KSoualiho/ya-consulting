<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class EncryptionService
{
    /**
     * Chiffrer une données
     */
    public static function encrypt($data)
    {
        if (!$data) {
            return null;
        }
        return Crypt::encryptString($data);
    }
    
    /**
     * Déchiffrer une donnée
     */
    public static function decrypt($data)
    {
        if (!$data) {
            return null;
        }
        try {
            return Crypt::decryptString($data);
        } catch (\Exception $e) {
            \Log::error('Erreur déchiffrement: ' . $e->getMessage());
            return $data; // Retourner la donnée brute si déchiffrement échoue
        }
    }
    
    /**
     * Vérifier si une donnée est déjà chiffrée
     */
    public static function isEncrypted($data)
    {
        if (!$data || !is_string($data)) {
            return false;
        }
        
        try {
            Crypt::decryptString($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
