# 🔒 Documentation Sécurité - Section 7 du Cahier des Charges

## Vue d'ensemble
Cette documentation décrit toutes les mesures de sécurité implémentées pour protéger les données sensibles de l'application.

---

## 1. **Authentification et Autorisation**

### ✅ Authentication
- Laravel Authentication built-in avec sessions sécurisées
- Token CSRF sur tous les formulaires
- Mots de passe hachés avec bcrypt

### ✅ Système de Rôles
- **admin** : accès complet
- **manager** : gestion des techniciens et clients
- **technicien** : gestion des interventions et rapports

### ✅ Contrôle d'accès par route
```php
Route::middleware('role:admin,manager')->resource('clients', ClientController::class);
Route::middleware('role:admin')->prefix('admin')->group(...);
```

---

## 2. **Chiffrement des Données Sensibles**

### 📁 Service de Chiffrement
**Localisation** : `app/Services/EncryptionService.php`

Méthodes disponibles :
```php
EncryptionService::encrypt($data)       // Chiffrer une données
EncryptionService::decrypt($data)       // Déchiffrer
EncryptionService::isEncrypted($data)   // Vérifier si chiffré
```

Utilisation : Chiffrement symétrique AES-256 via `Crypt` facade de Laravel (APP_KEY).

### 📱 Données Clients Chiffrées
**Modèle** : `app/Models/Client.php`

Champs chiffrés :
- ✅ `telephone` - Numéro de téléphone
- ✅ `adresse` - Adresse physique
- ✅ `code_postal` - Code postal

Implémentation : Accessors/Mutators Eloquent
```php
// Déchiffrement automatique en lecture
public function getTelephoneAttribute($value)
{
    return EncryptionService::decrypt($value);
}

// Chiffrement automatique en écriture
public function setTelephoneAttribute($value)
{
    $this->attributes['telephone'] = EncryptionService::encrypt($value);
}
```

### 📂 Chiffrement des Fichiers
**Service** : `app/Services/FileEncryptionService.php`

Méthodes :
```php
FileEncryptionService::encryptFile($path)      // Chiffrer un fichier
FileEncryptionService::decryptFile($path)      // Déchiffrer
FileEncryptionService::isEncrypted($path)      // Vérifier si chiffré
FileEncryptionService::getFileUrl($path)       // URL temporaire
```

Fichiers protégés :
- 📸 Photos d'interventions
- 📝 Signatures des clients
- 📄 Documents attachés

### 🔄 Migration des Données Existantes
Chiffrer toutes les données existantes :
```bash
php artisan encrypt:data --force
```

Commande : `app/Console/Commands/EncryptExistingData.php`

---

## 3. **Rate Limiting (Prévention des Abus)**

### 🚫 Routes Protégées par Throttling

**Login** (5 tentatives par minute)
```php
Route::post('/login', ...)->middleware('throttle:5,1');
```

**Interventions** (60 requêtes par minute)
```php
Route::post('/interventions', ...)->middleware('throttle:60,1');
Route::put('/interventions/{id}', ...)->middleware('throttle:60,1');
```

**Rapports** (30 requêtes par minute)
```php
Route::post('/rapports', ...)->middleware('throttle:30,1');
Route::post('/rapports/{id}/valider', ...)->middleware('throttle:30,1');
```

Prévient :
- ⚠️ Attaques par brute force
- ⚠️ Spam de formulaires
- ⚠️ DoS (Déni de Service)

---

## 4. **Audit Logging (Traçabilité Complète)**

### 📋 Système d'Audit
**Service** : `app/Services/AuditService.php`

Chaque action enregistre :
- Utilisateur qui a effectué l'action (user_id)
- Adresse IP de l'utilisateur
- Timestamp exact
- Valeurs avant/après les modifications
- Description lisible de l'action

### 📊 Table d'Audit
**Table** : `activity_logs`

Colonnes :
- `id` - Primary key
- `user_id` - Utilisateur responsable
- `intervention_id` - Intervention concernée
- `action` - Type d'action (create, update, assign, valider)
- `model_type` - Type de modèle (Intervention, Rapport)
- `model_id` - ID du modèle modifié
- `old_values` - Données avant (JSON)
- `new_values` - Données après (JSON)
- `description` - Description lisible
- `ip_address` - IP de la requête
- `created_at`, `updated_at`

### 📌 Actions Tracées
- ✅ Création d'intervention
- ✅ Modification d'intervention
- ✅ Changement de technicien assigné
- ✅ Création de rapport
- ✅ Validation de rapport

### 📖 Visualisation
Timeline dans page d'intervention : `resources/views/interventions/show.blade.php`

Affiche :
- Historique chronologique
- Utilisateur responsable
- Description de l'action
- Changements (old → new)

---

## 5. **Protection des Sessions**

### 🔐 Configuration Sécurisée
- ✅ Cookies de session : HttpOnly
- ✅ CSRF protection via middleware
- ✅ Session timeout configurable
- ✅ Regeneration de session après login

---

## 6. **Validation et Sanitization**

### ✔️ Validation des Entrées
Tous les contrôleurs utilisent `$this->validate()` pour :
- Vérifier les types de données
- Valider les formats (email, téléphone)
- Limiter la taille des fichiers
- Rejeter les données invalides

### 🧹 Protection XSS
- ✅ Blade templates auto-échappe les sorties (`{{ }}`)
- ✅ Pas de `{!! !!}` sans besoin explicite

---

## 7. **Gestion des Secrets**

### 🔑 APP_KEY
- Utilisé pour le chiffrement symétrique
- À garder sécurisé dans `.env`
- Jamais commiter en version control

### 🗂️ Variables d'Environnement
- `.env` : fichier local non versionné
- `.env.example` : template pour la documentation
- Contient : credentials DB, clés API, secrets

---

## 8. **Configuration Recommandée**

### .env
```env
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=false                          # Jamais true en production
APP_ENV=production

DB_HOST=localhost
DB_DATABASE=monprojet
DB_USERNAME=root
DB_PASSWORD=

# Force HTTPS en production
APP_FORCE_HTTPS=true
SESSION_SECURE_COOKIES=true
SESSION_HTTP_ONLY=true
```

### Security Headers
À ajouter dans .htaccess ou nginx :
```
X-Frame-Options: DENY
X-Content-Type-Options: nosniff
X-XSS-Protection: 1; mode=block
```

---

## 9. **Checklist de Sécurité Production**

- [ ] APP_DEBUG = false
- [ ] APP_ENV = production
- [ ] APP_KEY configurée et sécurisée
- [ ] HTTPS activé
- [ ] Cookies sécurisés (httponly, secure)
- [ ] CSRF protection active
- [ ] Données clients chiffrées (`php artisan encrypt:data`)
- [ ] Fichiers sensibles chiffrés
- [ ] Sauvegardes quotidiennes
- [ ] Logs centralisées et monitorées
- [ ] Rate limiting activé
- [ ] Audit logging en place

---

## 10. **Commandes Utiles**

```bash
# Chiffrer les données existantes
php artisan encrypt:data --force

# Générer une nouvelle APP_KEY
php artisan key:generate

# Vérifier les permissions des fichiers
ls -la storage/ bootstrap/cache/

# Consulter les logs d'audit
php artisan tinker
>>> DB::table('activity_logs')->latest()->take(10)->get();
```

---

## 11. **Dépannage**

### Erreur : "Failed to decrypt data"
**Cause** : APP_KEY a changé après chiffrement
**Solution** : Restaurer l'ancienne APP_KEY ou re-chiffrer avec `php artisan encrypt:data`

### Données apparaissent chiffrées en frontend
**Cause** : EncryptionService::decrypt() échoue
**Solution** : Vérifier les logs, vérifier l'APP_KEY

### Rate limiting bloque les utilisateurs légitimes
**Solution** : Augmenter les limites dans `routes/web.php`

---

## 12. **Support et Escalade**

Pour les incidents de sécurité :
1. Vérifier les logs d'audit (`activity_logs`)
2. Vérifier les logs applicatifs (`storage/logs/`)
3. Vérifier les adresses IP suspectes
4. Contacter l'administrateur système
5. Envisager la rotation des clés API

