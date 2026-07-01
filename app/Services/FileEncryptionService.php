<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class FileEncryptionService
{
    /**
     * Chiffrer un fichier uploadé
     */
    public static function encryptFile($filePath, $disk = 'public')
    {
        try {
            if (!Storage::disk($disk)->exists($filePath)) {
                \Log::error("Fichier non trouvé: $filePath");
                return null;
            }
            
            // Lire le contenu du fichier
            $content = Storage::disk($disk)->get($filePath);
            
            // Chiffrer le contenu
            $encrypted = Crypt::encryptString($content);
            
            // Générer un nouveau nom avec .encrypted
            $parts = explode('.', $filePath);
            $extension = array_pop($parts);
            $basename = implode('.', $parts);
            $encryptedPath = $basename . '.encrypted';
            
            // Sauvegarder le fichier chiffré
            Storage::disk($disk)->put($encryptedPath, $encrypted);
            
            // Supprimer l'original
            Storage::disk($disk)->delete($filePath);
            
            \Log::info("Fichier chiffré: $filePath -> $encryptedPath");
            return $encryptedPath;
            
        } catch (\Exception $e) {
            \Log::error('Erreur chiffrement fichier: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Déchiffrer un fichier
     */
    public static function decryptFile($filePath, $disk = 'public')
    {
        try {
            if (!Storage::disk($disk)->exists($filePath)) {
                \Log::error("Fichier chiffré non trouvé: $filePath");
                return null;
            }
            
            // Lire le contenu chiffré
            $encrypted = Storage::disk($disk)->get($filePath);
            
            // Déchiffrer
            $content = Crypt::decryptString($encrypted);
            
            return $content;
            
        } catch (\Exception $e) {
            \Log::error('Erreur déchiffrement fichier: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Obtenir l'URL d'un fichier (génère une URL temporaire pour déchiffrement)
     */
    public static function getFileUrl($filePath, $disk = 'public', $expiresIn = 3600)
    {
        try {
            // Si le fichier est chiffré, générer une URL temporaire
            if (Str::endsWith($filePath, '.encrypted')) {
                return route('files.decrypt', [
                    'path' => base64_encode($filePath),
                    'expires' => now()->addSeconds($expiresIn)->timestamp
                ]);
            }
            
            return Storage::disk($disk)->url($filePath);
        } catch (\Exception $e) {
            \Log::error('Erreur URL fichier: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Vérifier si un fichier est chiffré
     */
    public static function isEncrypted($filePath)
    {
        return Str::endsWith($filePath, '.encrypted');
    }
}
