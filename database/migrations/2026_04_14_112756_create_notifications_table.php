<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('intervention_id')->nullable()->constrained('interventions')->onDelete('cascade');
            $table->string('type'); // assignation, rappel, confirmation, rappel_avant
            $table->string('titre');
            $table->text('message');
            $table->boolean('lue')->default(false);
            $table->boolean('email_envoye')->default(false);
            $table->timestamp('date_envoi')->nullable();
            $table->timestamp('date_rappel')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};