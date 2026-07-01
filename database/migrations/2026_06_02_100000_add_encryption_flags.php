<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ajouter une colonne pour marquer les données comme chiffrées
        if (!Schema::hasColumn('clients', 'encrypted')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->boolean('encrypted')->default(false)->after('ville');
            });
        }
        
        // Ajouter une colonne pour marquer les données rapports comme chiffrées
        if (!Schema::hasColumn('rapports', 'encrypted')) {
            Schema::table('rapports', function (Blueprint $table) {
                $table->boolean('encrypted')->default(false)->after('date_validation');
            });
        }
    }

    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            if (Schema::hasColumn('clients', 'encrypted')) {
                $table->dropColumn('encrypted');
            }
        });
        
        Schema::table('rapports', function (Blueprint $table) {
            if (Schema::hasColumn('rapports', 'encrypted')) {
                $table->dropColumn('encrypted');
            }
        });
    }
};
