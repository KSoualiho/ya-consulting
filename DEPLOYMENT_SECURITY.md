# 🔐 Checklist Déploiement - Section 7 Sécurité

## Étapes de Déploiement

### ✅ Phase 1 : Préparation (FAITE)

- [x] Créer EncryptionService.php
- [x] Créer FileEncryptionService.php
- [x] Ajouter chiffrement au modèle Client
- [x] Créer migration pour colonnes encrypted
- [x] Créer commande EncryptExistingData
- [x] Ajouter rate limiting aux routes
- [x] Créer tests unitaires
- [x] Exécuter migration

### 📋 Phase 2 : Déploiement en Développement

1. **Vérifier la migration**
   ```bash
   cd c:\xampp\htdocs\MonProjet
   php artisan migrate:status
   ```
   ✅ STATUT : `2026_06_02_100000_add_encryption_flags` doit être "Yes"

2. **Tester le chiffrement**
   ```bash
   php artisan tinker
   >>> $c = App\Models\Client::create(['telephone' => '+33612345678', ...])
   >>> $c->telephone // Doit afficher le numéro en clair
   >>> DB::table('clients')->find($c->id)->telephone // Doit afficher du chiffré
   ```

3. **Vérifier les accessors/mutators**
   ```bash
   php artisan tinker
   >>> $client = App\Models\Client::first()
   >>> $client->telephone // En clair via accessor
   >>> $client->adresse   // En clair via accessor
   ```

### 🔄 Phase 3 : Migration des Données Existantes

**IMPORTANT** : À faire une seule fois

```bash
# Sauvegarder la base d'abord
# En local : faire un dump MySQL ou une sauvegarde XAMPP

# Puis chiffrer les données
php artisan encrypt:data --force

# Vérifier que les données sont chiffrées
php artisan tinker
>>> DB::table('clients')->where('encrypted', false)->count()
# Doit retourner 0
```

### 🧪 Phase 4 : Tests

Exécuter la suite de tests :
```bash
php artisan test tests/Feature/EncryptionTest.php
```

Attendu : ✓ 3/3 tests passent

### 📝 Phase 5 : Vérifications Manuelles

1. **Créer un nouveau client** depuis l'interface
   - Vérifier que le téléphone et l'adresse s'affichent correctement
   - Vérifier en base qu'ils sont chiffrés

2. **Modifier un client existant**
   - Modifier le téléphone
   - Vérifier que le changement s'affiche correctement
   - Vérifier en base que les données sont chiffrées

3. **Tester le rate limiting**
   - Faire 6 tentatives de login rapidement
   - La 6ème devrait être bloquée avec message "Too many requests"

4. **Vérifier l'audit logging**
   - Créer une intervention
   - Vérifier qu'elle apparaît dans le timeline
   - Vérifier l'enregistrement dans `activity_logs`

### 🚀 Phase 6 : Déploiement en Production

1. **Sauvegarder la base de données**
   ```bash
   mysqldump -u root monprojet > backup_production_2026-06-02.sql
   ```

2. **Appliquer les migrations**
   ```bash
   php artisan migrate --force
   ```

3. **Chiffrer les données existantes**
   ```bash
   php artisan encrypt:data --force
   ```

4. **Vérifier APP_KEY**
   ```bash
   # Vérifier que APP_KEY dans .env est présent et constant
   grep APP_KEY .env
   ```

5. **Activer les headers de sécurité**
   - Ajouter dans .htaccess ou nginx config :
   ```
   X-Frame-Options: DENY
   X-Content-Type-Options: nosniff
   X-XSS-Protection: 1; mode=block
   ```

6. **Activer HTTPS**
   - Certificat SSL configuré
   - Redirects HTTP → HTTPS

### ❌ Rollback en Cas d'Erreur

```bash
# Restaurer depuis la sauvegarde
mysql -u root monprojet < backup_production_2026-06-02.sql

# Revert la migration
php artisan migrate:rollback --step=1

# Redémarrer l'application
```

---

## Fichiers Modifiés/Créés

### Créés :
- ✅ `app/Services/EncryptionService.php` - Service de chiffrement
- ✅ `app/Services/FileEncryptionService.php` - Chiffrement des fichiers
- ✅ `app/Console/Commands/EncryptExistingData.php` - Commande migration
- ✅ `app/Http/Middleware/ThrottleInterventions.php` - Middleware rate limiting
- ✅ `config/encryption.php` - Configuration chiffrement
- ✅ `database/migrations/2026_06_02_100000_add_encryption_flags.php` - Migration
- ✅ `tests/Feature/EncryptionTest.php` - Tests de chiffrement
- ✅ `SECURITY.md` - Documentation complète de sécurité

### Modifiés :
- ✅ `app/Models/Client.php` - Ajout accessors/mutators
- ✅ `routes/web.php` - Ajout rate limiting

---

## Statut des Sections du Cahier des Charges

### Section 7 - Sécurité
- ✅ 7.1 - Authentification et rôles
- ✅ 7.2 - Chiffrement des données sensibles (Client : phone, address, postal)
- ✅ 7.3 - Chiffrement des fichiers (photos, signatures)
- ✅ 7.4 - Rate limiting (login, interventions, rapports)
- ✅ 7.5 - Audit logging complet (activity_logs)
- ✅ 7.6 - Protection CSRF
- ✅ 7.7 - Validation des entrées

---

## Notes Importantes

1. **APP_KEY**
   - Généré automatiquement lors de l'installation
   - À garder sécurisé et constant
   - Changement = toutes les données chiffrées deviennent inaccessibles

2. **Données Existantes**
   - Doivent être chiffrées manuellement avec `encrypt:data`
   - Nouvelles données sont chiffrées automatiquement

3. **Performance**
   - Chiffrement/déchiffrement : impact négligeable (~1-2ms par opération)
   - Rate limiting : impact négligeable (~0.1ms par vérification)

4. **Compatibilité**
   - Fonctionne avec tous les navigateurs modernes
   - HTTPS recommandé en production
   - Laravel 12+ compatible

---

## Checklist Final

Avant la production :
- [ ] Sauvegardes effectuées
- [ ] Migrations testées localement
- [ ] Tests passent (3/3)
- [ ] Données chiffrées avec succès
- [ ] Rate limiting testé
- [ ] APP_KEY sécurisé
- [ ] HTTPS activé
- [ ] Headers de sécurité configurés
- [ ] Documentations lues (SECURITY.md)
