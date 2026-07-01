<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;
use App\Services\EncryptionService;

class EncryptExistingData extends Command
{
    protected $signature = 'encrypt:data {--force : Forcer le chiffrement}';
    protected $description = 'Chiffrer toutes les données sensibles existantes';

    public function handle()
    {
        if (!$this->option('force') && !$this->confirm('Êtes-vous sûr de vouloir chiffrer toutes les données ? Cette opération est irréversible sans sauvegarde.')) {
            return Command::FAILURE;
        }

        $this->line('Chiffrement des données clients...');
        $this->encryptClientData();
        
        $this->info('✓ Chiffrement terminé avec succès !');
        return Command::SUCCESS;
    }

    private function encryptClientData()
    {
        // Récupérer tous les clients non encore chiffrés
        $clients = Client::where('encrypted', false)->get();
        
        if ($clients->isEmpty()) {
            $this->info('Aucun client à chiffrer.');
            return;
        }

        $bar = $this->output->createProgressBar($clients->count());

        foreach ($clients as $client) {
            try {
                // Ne chiffrer que si pas déjà chiffré
                if (!EncryptionService::isEncrypted($client->telephone)) {
                    $client->telephone = EncryptionService::encrypt($client->telephone);
                }
                
                if (!EncryptionService::isEncrypted($client->adresse)) {
                    $client->adresse = EncryptionService::encrypt($client->adresse);
                }
                
                if (!EncryptionService::isEncrypted($client->code_postal)) {
                    $client->code_postal = EncryptionService::encrypt($client->code_postal);
                }
                
                $client->encrypted = true;
                $client->save();
                
                $bar->advance();
            } catch (\Exception $e) {
                $this->error("\nErreur client #{$client->id}: {$e->getMessage()}");
            }
        }

        $bar->finish();
        $this->line('');
    }
}
