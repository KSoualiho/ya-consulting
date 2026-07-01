<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Client;
use App\Services\EncryptionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EncryptionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test que les données clients sont chiffrées automatiquement
     */
    public function test_client_data_encryption()
    {
        $clientData = [
            'nom_entreprise' => 'Test Corp',
            'contact' => 'John Doe',
            'telephone' => '+33612345678',
            'email' => 'test@example.com',
            'adresse' => '123 Rue de Test',
            'code_postal' => '75001',
            'ville' => 'Paris'
        ];

        // Créer un client
        $client = Client::create($clientData);

        // Vérifier que les données sensibles sont chiffrées en base
        $raw = \DB::table('clients')->find($client->id);
        
        $this->assertTrue(EncryptionService::isEncrypted($raw->telephone));
        $this->assertTrue(EncryptionService::isEncrypted($raw->adresse));
        $this->assertTrue(EncryptionService::isEncrypted($raw->code_postal));

        // Vérifier que l'accessor déchiffre les données
        $this->assertEquals($clientData['telephone'], $client->telephone);
        $this->assertEquals($clientData['adresse'], $client->adresse);
        $this->assertEquals($clientData['code_postal'], $client->code_postal);
    }

    /**
     * Test que le chiffrement/déchiffrement fonctionne
     */
    public function test_encryption_service()
    {
        $originalData = '+33612345678';

        // Chiffrer
        $encrypted = EncryptionService::encrypt($originalData);
        $this->assertNotEquals($originalData, $encrypted);
        $this->assertTrue(EncryptionService::isEncrypted($encrypted));

        // Déchiffrer
        $decrypted = EncryptionService::decrypt($encrypted);
        $this->assertEquals($originalData, $decrypted);
    }

    /**
     * Test que null est géré correctement
     */
    public function test_encryption_handles_null()
    {
        $this->assertNull(EncryptionService::encrypt(null));
        $this->assertNull(EncryptionService::decrypt(null));
        $this->assertFalse(EncryptionService::isEncrypted(null));
    }
}
