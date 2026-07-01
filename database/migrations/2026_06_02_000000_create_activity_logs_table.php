<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('intervention_id')->nullable();
            $table->string('action'); // create, update, delete, assign, status_change, etc.
            $table->string('model_type'); // Intervention, Rapport, etc.
            $table->unsignedBigInteger('model_id');
            $table->text('old_values')->nullable(); // JSON des anciennes valeurs
            $table->text('new_values')->nullable(); // JSON des nouvelles valeurs
            $table->text('description')->nullable(); // Description lisible
            $table->string('ip_address')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('intervention_id')->references('id')->on('interventions')->onDelete('set null');
            $table->index(['intervention_id', 'created_at']);
            $table->index(['user_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
