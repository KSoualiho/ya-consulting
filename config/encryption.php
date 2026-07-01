<?php

/**
 * Configuration du chiffrement des fichiers sensibles
 */

return [
    'enabled' => true,
    
    // Types de fichiers à chiffrer
    'encrypt_types' => [
        'photo',
        'signature',
        'document'
    ],
    
    // Dossiers sensibles
    'sensitive_paths' => [
        'rapports_photos',
        'signatures',
        'documents'
    ],
    
    // Taille max des fichiers à chiffrer
    'max_size' => 50 * 1024 * 1024, // 50MB
];
